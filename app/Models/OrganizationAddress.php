<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class OrganizationAddress extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'crm_organization_addresses';

    protected $fillable = ['organization_id', 'title', 'holder_name', 'phone_code', 'phone', 'email', 'address_line_1', 'address_line_2', 'country_id', 'state_id', 'city_id', 'zip_code',];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }
}
