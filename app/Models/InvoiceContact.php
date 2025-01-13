<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceContact extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'crm_invoice_contacts';

    protected $fillable = ['tenant_id', 'invoice_id', 'contact_id'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
