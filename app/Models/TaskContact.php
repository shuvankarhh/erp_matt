<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Vendor\Tauhid\Encryption\Encryption;

class TaskContact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'crm_task_contacts';
    
    public function contact()
    {
        return $this->hasOne('App\Models\Contact', 'id', 'contact_id');
    }
    
}
