<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Vendor\Tauhid\Encryption\Encryption;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quote extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'crm_quotes';

    public function encrypted_id()
    {
        return Encryption::encrypt($this->id, 'kGhn$bm*1#12H*t1', 'kGhn$bm*1#12H*tg');
    }
    public static function decrypted_id($string)
    {
        return Encryption::decrypt($string, 'kGhn$bm*1#12H*t1', 'kGhn$bm*1#12H*tg');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function saleOwner()
    {
        return $this->belongsTo(Staff::class, 'owner_id');
    }

    public function timezone()
    {
        return $this->belongsTo(Timezone::class, 'user_timezone_id');
    }
}