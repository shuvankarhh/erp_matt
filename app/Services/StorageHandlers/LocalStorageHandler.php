<?php

namespace App\Services\StorageHandlers;

class LocalStorageHandler
{
    public static function upload($file, string $path, bool $is_private, string $link)
    {
        // relative path starts from storage folder
        $path_from_storage = $path;

        if ($is_private == false) {
            $path_from_storage = 'public/' . $path;
        }

        $upload_info['uploaded_path'] = $file->store($path_from_storage);

        $upload_info['uploaded_url'] = null;
        
        if ($is_private == false) {
            $upload_info['uploaded_url'] = asset($link . '/' . $path . '/' . basename($upload_info['uploaded_path']));
        }

        return $upload_info;
    }

    public static function getFile(string $path)
    {
        return response()->file('../storage/app/' . $path);
    }
}
