<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialsandEquipment extends Model
{
    use HasFactory;

    public function pricelist()
    {
        return  $this->belongsTo(Pricelist::class, 'pricelist_id');
    }

    public function projectMaterial()
    {
        return $this->hasOne(ProjectMaterial::class, 'materials_and_equipment_id', 'id');
    }
}
