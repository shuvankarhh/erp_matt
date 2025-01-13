<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Vendor\Tauhid\Encryption\Encryption;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quote extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'expiration_date' => 'datetime',
    ];

    protected $table = 'crm_quotes';

    protected $guarded = [];

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
        return $this->belongsTo(Timezone::class);
    }

    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'crm_quote_contacts', 'quote_id', 'contact_id');
    }

    public function solutions()
    {
        return $this->belongsToMany(Solution::class, 'crm_quote_solutions')
            ->withPivot('quantity', 'discount_percentage')
            ->withTimestamps();
    }
}
