<?php

namespace App\Services\StorageHandlers;

use Illuminate\Support\Facades\Storage;
use App\Models\StorageProvider;
use App\Services\StorageHandlers\LocalStorageHandler;

class DynamicStorageHandler
{
    private $storage_provider;

    public function __construct(string $disk = null)
    {
        if($disk == null) {
            $this->storage_provider = StorageProvider::where('acting_status', 1)->first();
        } else {
            $this->storage_provider = StorageProvider::where('alias', $disk)->first();
        }
    }

    public function upload($file, string $path, bool $is_private = false, string $link = 'storage')
    {
        if ($this->storage_provider->alias == 'local') {
            $upload_info = LocalStorageHandler::upload($file, $path, $is_private, $link);
        }

        $upload_info['storage_provider_id'] = $this->storage_provider->id;

        return $upload_info;
    }

    public function exists(string $path, string $disk = null)
    {
        if ($disk == null) {
            $disk = $this->storage_provider->alias;
        }

        if ($disk == 'local') {
            return Storage::disk($disk)->exists($path);
        }
    }

    public function show(string $path, string $disk = null)
    {
        if ($disk == null) {
            $disk = $this->storage_provider->alias;
        }

        if ($this->exists($path, $disk)) {
            if ($disk == 'local') {
                return LocalStorageHandler::getFile($path);
            }
        } else {
            abort(404);
        }
    }

    public function delete(string $path, string $disk = null)
    {
        if ($disk == null) {
            $disk = $this->storage_provider->alias;
        }

        if ($disk == 'local') {
            return Storage::disk($disk)->delete($path);
        }
    }
}
