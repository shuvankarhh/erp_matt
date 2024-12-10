<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Vendor\Tauhid\Encryption\Encryption;

class TaskSale extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'crm_task_sales';

    public function sale()
    {
        return $this->hasOne('App\Models\Sale', 'id', 'sale_id');
    }
}
