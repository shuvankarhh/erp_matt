<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteContact extends Model
{
    use HasFactory;

    protected $table = 'crm_quote_contacts';
    protected $fillable = ['quote_id', 'contact_id'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
