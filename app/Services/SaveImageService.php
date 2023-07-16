<?php

namespace App\Services;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SaveImageService
{
    public static function uploadImage($requestImage, $model, $folder)
    {
        // Option One
        $path = Storage::putFile($folder, new File($requestImage));

        Image::make($requestImage)->resize(1200, 630)->save($path);

        $model->image = $path;

        // // Option Two
        // $image = $requestImage;

        // $imageName = $image->getClientOriginalName();
        // $imageNewName = explode('.', $imageName)[0];

        // $fileExtension = time() . $imageNewName . '.' . $image->getClientOriginalExtension();
        // $location = storage_path('app/public/' . $folder . '/' . $fileExtension);
        // Image::make($image)->resize(1200, 630)->save($location);
        
        // $model->image = $fileExtension;
    }
}