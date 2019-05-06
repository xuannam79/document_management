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
            $nameFile = explode('.',$documentFile->getClientOriginalName());
            $newName = time() .'-'. $nameFile[0] . '.' . $fileExtension;
            $path = public_path('files/file_attachment');
            $documentFile = $newName;
            $file->move($path, $newName);
            return $newName;
        }
    }
}
