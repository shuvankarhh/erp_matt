<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use SoftDeletes;
    
    protected $table = 'crm_emails';
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'email_id', 'id');
    }

    public function user_emails()
    {
        return $this->hasMany('App\Models\UserEmail', 'email_id', 'id');
    }

    
}