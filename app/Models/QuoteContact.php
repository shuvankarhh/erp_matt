<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteContact extends Model
{
    use HasFactory;

    protected $table = 'crm_quote_contacts';

    protected $fillable = ['tenant_id', 'quote_id', 'contact_id'];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
