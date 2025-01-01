<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskTicket extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'crm_task_tickets';

    protected $fillable = ['tenant_id', 'task_id', 'ticket_id'];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }
}
