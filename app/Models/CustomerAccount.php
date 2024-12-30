<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\Vendor\Tauhid\Encryption\Encryption;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerAccount extends Model
{
    use HasFactory;

    protected $table = 'crm_customer_accounts';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
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
