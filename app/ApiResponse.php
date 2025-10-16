<?php

namespace App;

trait ApiResponse
{
    
    public function successResponse($data, $message = 'Success', $code = 200)
    {
        
        return response()->json(['success' => true, 'data' => $data, 'message' => $message], $code);

    }

   
    public function errorResponse($message = 'Error', $code = 400)
    {
        return response()->json(['success' => false, 'message' => $message], $code);
    }
}
