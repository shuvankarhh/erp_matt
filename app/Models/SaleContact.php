<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleContact extends Model
{
    use HasFactory;

    protected $table = 'crm_sale_contacts';

    protected $fillable = ['tenant_id', 'sale_id', 'contact_id'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
