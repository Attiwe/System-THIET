<?php

namespace App\Utils;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;



/**
 * Class ImageMangment
 * @package App\Utils
 */
class ImageMangment
{
    public static function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('', $filename, ['disk' => 'news_image']);
            return $path;
        }
        return null;
    }


    public static function uploadImages(Request $request)
    {
        $imagesPath = [];

        if ($request->hasFile('image_new')) {
            foreach ($request->file('image_new') as $image) {
                $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('', $filename, ['disk' => 'news_images_news']);
                $imagesPath[] = $path;
            }
        }

        return $imagesPath ? json_encode($imagesPath) : null;
    }




    public static function updateuploadImage(UploadedFile $file)
    {
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('', $filename, ['disk' => 'news_image']);
        return $path;
    }


    public static function updateUploadImages($file)
    {
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('', $filename, ['disk' => 'news_images_news']);
        return $path;
    }


    private static function fileName($image)
    {
        $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
        return $filename;

    }

    public static function deleteImages($imagesJson, $disk = 'news_images_news')
    {
        if (!$imagesJson)
            return;

        $images = is_array($imagesJson) ? $imagesJson : json_decode($imagesJson, true);

        foreach ($images as $image) {
            Storage::disk($disk)->delete($image);
        }
    }

    public static function deleteFile($imagePath, $disk = 'news_image') 
    {
        if ($imagePath) {
            Storage::disk($disk)->delete($imagePath);
        }
    }


}
