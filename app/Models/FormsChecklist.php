<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormsChecklist extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'task_forms_checklists';

    protected $fillable = [
        'tenant_id',
        'task_id',
        'project_id',
        'form_type',
        'completed_by',
        'completed_at',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function completedBy()
    {
        return $this->belongsTo(User::class, 'completed_by');
    }
}
