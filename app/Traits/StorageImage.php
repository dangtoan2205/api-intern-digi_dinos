<?php

namespace App\Traits;

use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mnabialek\LaravelSqlLogger\FileName;

trait StorageImage
{
    /**
    * Storage Image
    *
    * @param mixed $request    Request.
    * @param mixed $fileName   FileName.
    * @param mixed $folderName FolderName.
    *
    * @return dataUpload $dataUpload
    */
    public function storageImage($request, $fileName, $folderName)
    {
        if ($request->hasFile($fileName)) {
            $file = $request[$fileName];
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();

            // $filePath = $request->file($fileName)->storeAs('public/' . $folderName . '/' .auth()->guard('api')->user()->id, $fileNameHash);
            $filePath = $request->file($fileName)->move('images/' . $folderName, $fileNameHash);

            $dataUpload = [
                // 'file_name' => $fileNameOrigin,
                'file_path' => $filePath,
            ];
            return $dataUpload;
        }
        return null;
    }
}
