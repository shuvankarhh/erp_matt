<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactAddress extends Model
{
    use HasFactory;

    protected $table = 'crm_contact_addresses';

    protected $fillable = ['contact_id', 'title', 'holder_name', 'address_phone', 'address_email', 'address_line_1', 'address_line_2', 'country_id', 'state_id', 'city_id', 'zip_code',];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
