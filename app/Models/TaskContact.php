<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskContact extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'crm_task_contacts';

    protected $fillable = ['tenant_id', 'task_id', 'contact_id'];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
