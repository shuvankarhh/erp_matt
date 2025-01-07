<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Services\Vendor\Tauhid\Encryption\Encryption;
use Illuminate\Database\Eloquent\Factories\HasFactory;


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

    public function contact(): HasOne
    {
        return $this->hasOne(TaskContact::class);
    }

    public function organization(): HasOne
    {
        return $this->hasOne(TaskOrganization::class);
    }

    public function sale(): HasOne
    {
        return $this->hasOne(TaskSale::class);
    }

    public function ticket(): HasOne
    {
        return $this->hasOne(TaskTicket::class);
    }
}
