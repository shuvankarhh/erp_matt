<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Vendor\Tauhid\Encryption\Encryption;


class Task extends Model
{

    use HasFactory;

    use SoftDeletes;

    protected $table = 'crm_tasks';

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function encrypted_id()
    {
        return Encryption::encrypt($this->id, 'kGll$ab*x#xxH*op', 'kGll$ab*x#xxH*op');
    }

    public static function decrypted_id($string)
    {
        return Encryption::decrypt($string, 'kGll$ab*x#xxH*op', 'kGll$ab*x#xxH*op');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'assigned_to');
    }

    public function user_timezone()
    {
        return $this->hasOne('App\Models\Timezone', 'id', 'user_timezone_id');
    }
}
