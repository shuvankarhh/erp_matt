<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Vendor\Tauhid\Encryption\Encryption;

class StorageProvider extends Model
{
    use SoftDeletes;

    protected $table = 'crm_storage_providers';

    public function profile_photos()
    {
        return $this->hasMany(ProfilePhoto::class, 'storage_provider_id', 'id');
    }

    public function encrypted_id()
    {
        return Encryption::encrypt($this->id, 'kGll$bm*1#12H*89', 'kGll$bm*1#12H*89');
    }

    public static function decrypted_id($string)
    {
        return Encryption::decrypt($string, 'kGll$bm*1#12H*89', 'kGll$bm*1#12H*89');
    }

}
