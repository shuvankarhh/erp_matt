<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customefromfield extends Model
{
    use HasFactory;
    protected $table = 'crm_custome_from_fields';

    public function filedOptions()
    {
        return $this->hasMany('App\Models\CustomeFromFieldOption', 'from_field_id', 'id');
    }
}
