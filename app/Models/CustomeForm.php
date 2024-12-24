<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\Vendor\Tauhid\Encryption\Encryption;

class CustomeForm extends Model
{
    use HasFactory;    
    protected $table = 'crm_custome_form';


    public function encrypted_id()
    {
        return Encryption::encrypt($this->id, 'kGhn$xx*1#12H*t1', 'kGhn$xx*1#12H*tg');
    }

    public static function decrypted_id($string)
    {
        return Encryption::decrypt($string, 'kGhn$xx*1#12H*t1', 'kGhn$xx*1#12H*tg');
    }
}
