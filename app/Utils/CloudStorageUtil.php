<?php

namespace App\Utils;

class CloudStorageUtil
{
    public static function storeImage($image, $path){
        Storage::disk('gcs')->put($path, file_get_contents($image));
    }
}s