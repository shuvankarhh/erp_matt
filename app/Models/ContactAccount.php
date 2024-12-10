<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Vendor\Tauhid\Encryption\Encryption;

class ContactAccount extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table = 'crm_contact_accounts';

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function contact()
    {
        return $this->hasOne('App\Models\Contact', 'id', 'contact_id');
    }    

    public function ticketContact()
    {
        return $this->hasMany('App\Models\TicketContact', 'contact_id', 'id');
    }

    public function SaleContact()
    {
        return $this->hasMany('App\Models\SaleContact', 'id', 'contact_id');
    }

    public function encrypted_id()
    {
        return Encryption::encrypt($this->id, '9Ghn$bm*1#12H*t1', '9Ghn$bm*1#12H*t1');
    }

    public static function decrypted_id($string)
    {
        return Encryption::decrypt($string, '9Ghn$bm*1#12H*t1', '9Ghn$bm*1#12H*t1');
    }
}
