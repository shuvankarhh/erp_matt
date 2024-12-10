<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use SoftDeletes;
    
    protected $table = 'crm_user_phones';
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'phone_id', 'id');
    }
}