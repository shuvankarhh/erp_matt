<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\Vendor\Tauhid\Encryption\Encryption;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $casts = [
        'invoice_date' => 'datetime',
        'due_date' => 'datetime',
    ];

    protected $table = "crm_invoices";

    protected $guarded = [];

    public function encrypted_id()
    {
        return Encryption::encrypt($this->id, 'kGhn$bm*1#12H*t1', 'kGhn$bm*1#12H*tg');
    }
    public static function decrypted_id($string)
    {
        return Encryption::decrypt($string, 'kGhn$bm*1#12H*t1', 'kGhn$bm*1#12H*tg');
    }

    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'crm_invoice_contacts', 'invoice_id', 'contact_id');
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

    public function solutions()
    {
        return $this->belongsToMany(Solution::class, 'crm_invoice_solutions')
            ->withPivot('quantity', 'discount_percentage')
            ->withTimestamps();
    }
}
