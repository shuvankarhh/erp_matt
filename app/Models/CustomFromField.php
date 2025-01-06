<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomFromField extends Model
{
    use HasFactory;
    protected $table = 'crm_custom_from_fields';

    public function filedOptions()
    {
        return $this->hasMany('App\Models\CustomFromFieldOption', 'from_field_id', 'id');
    }
}
