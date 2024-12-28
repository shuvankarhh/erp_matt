<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Vendor\Tauhid\Encryption\Encryption;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Solution extends Model
{
    use HasFactory;
    
    use SoftDeletes;

    protected $table = "crm_solutions";

    public function encrypted_id()
    {
        return Encryption::encrypt($this->id, 'kGhn$bm*1#12H*t1', 'kGhn$bm*1#12H*tg');
    }
    public static function decrypted_id($string)
    {
        return Encryption::decrypt($string, 'kGhn$bm*1#12H*t1', 'kGhn$bm*1#12H*tg');
    }

    public function currency()
    {
        return $this->hasOne('App\Models\currency', 'id', 'currency_id');
    }

    public function storage_provider()
    {
        return $this->hasOne('App\Models\StorageProvider', 'id', 'storage_provider_id');
    }




}
