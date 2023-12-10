<?php

namespace App\Helpers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait UploadFileHepler
{
    protected $mainFolderName='uploads';
    public function createUploadedFilesFolder():void
    {
        if (!file_exists(public_path($this->mainFolderName))) {
            $dir = public_path($this->mainFolderName);
            mkdir($dir, 0777, true);
        }

    }
    public function uploadPhoto($image, $typeRepository):?string
    {
        $this->createUploadedFilesFolder();
        $fileName = $typeRepository->generateUniqueServerFileName($image->getClientOriginalName());
        $path = $image->storeAs($this->mainFolderName, $fileName, 'public_uploads');

        return $this->mainFolderName.$path;
    }
}
