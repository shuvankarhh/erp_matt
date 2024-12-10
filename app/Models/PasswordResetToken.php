<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{


    protected $table = 'crm_password_reset_tokens';
    protected $guarded = [];
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne('App\Models\User', 'email', 'email');
    }
}