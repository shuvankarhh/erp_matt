<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use SoftDeletes;
    
    protected $table = 'crm_notifications';
    protected $guarded = [];

    protected $attributes = [
        'sender_id' => 0,
        'is_seen' => 0
    ];
    
}