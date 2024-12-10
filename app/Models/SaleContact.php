<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleContact extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'crm_sale_contacts';

    protected $fillable = ['sale_id', 'contact_id'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }


}
