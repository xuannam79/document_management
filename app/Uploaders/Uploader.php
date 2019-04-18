<?php

namespace App\Uploaders;

class Uploader
{
    public function saveDocument($documentFile)
    {
        if (isset($documentFile)) {
            $strDefault = config('setting.str_default');
            $tokenName = substr(str_shuffle($strDefault), 0, 16);
            $file = $documentFile;
            $fileExtension = $documentFile->getClientOriginalExtension();
            $newName = $tokenName . time() . '.' . $fileExtension;
            $path = resource_path(config('setting.document.file_location'));
            $documentFile = $newName;
            $file->move($path, $newName);
            return $newName;
        }
    }
}
