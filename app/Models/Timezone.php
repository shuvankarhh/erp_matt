<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'crm_timezones';

    protected $fillable = ['name'];

    // protected $guarded = [];
}
