<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleList extends Model
{
    use HasFactory;

    protected $table = 'crm_module_lists';

    protected $fillable = ['name', 'slug'];
}
