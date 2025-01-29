<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Vendor\Tauhid\Encryption\Encryption;

class UserRole extends Model
{
    use SoftDeletes;

    protected $table = 'crm_user_roles';
    
    protected $guarded = [];

    public function encrypted_id()
    {
        return Encryption::encrypt($this->id, 'kGhn$bm*2#12H*t1', 'kGhn$bm*2#12H*tg');
    }

    public static function decrypted_id($string)
    {
        return Encryption::decrypt($string, 'kGhn$bm*2#12H*t1', 'kGhn$bm*2#12H*tg');
    }
}
