<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidatePostSize
{
    /**
     * Handle an incoming request.
     * Overrides Laravel's default ValidatePostSize to allow large video uploads.
     */
    public function handle(Request $request, Closure $next)
    {
        // Set high limits for large file uploads
        ini_set('post_max_size', '500M');
        ini_set('upload_max_filesize', '500M');
        ini_set('max_execution_time', '300');
        ini_set('memory_limit', '512M');

        $max = $this->getPostMaxSize();

        if ($max > 0 && $request->server('CONTENT_LENGTH') > $max) {
            throw new \Illuminate\Http\Exceptions\PostTooLargeException;
        }

        return $next($request);
    }

    protected function getPostMaxSize()
    {
        if (is_numeric($postMaxSize = ini_get('post_max_size'))) {
            return (int) $postMaxSize;
        }

        $metric = strtoupper(substr($postMaxSize, -1));
        $postMaxSize = (int) $postMaxSize;

        return match ($metric) {
            'K' => $postMaxSize * 1024,
            'M' => $postMaxSize * 1048576,
            'G' => $postMaxSize * 1073741824,
            default => $postMaxSize,
        };
    }
}
