<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskSale extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'crm_task_sales';

    protected $fillable = ['tenant_id', 'task_id', 'sale_id'];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }
}
