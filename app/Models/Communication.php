<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Communication extends Model
{
    use HasFactory;
    
    use SoftDeletes;

    protected $table = 'communications';

    // protected $fillable = ['tenant_id', 'summary', 'type', 'project_id'];

}
