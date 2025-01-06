<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\Vendor\Tauhid\Encryption\Encryption;

class CustomForm extends Model
{
    use HasFactory;    
    protected $table = 'crm_custom_form';

    public function encrypted_id()
    {
        return Encryption::encrypt($this->id, 'kGhn$xx*1#12H*t1', 'kGhn$xx*1#12H*tg');
    }

    public static function decrypted_id($string)
    {
        return Encryption::decrypt($string, 'kGhn$xx*1#12H*t1', 'kGhn$xx*1#12H*tg');
    }

    // public function customFormData()
    // {
    //     return  $this->belongsTo(CustomFormData::class, 'form_id');
    // }

    public function customFormData()
    {
        return $this->hasMany('App\Models\CustomFormData', 'form_id', 'id');
    }

}
