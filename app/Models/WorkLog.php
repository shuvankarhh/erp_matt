<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'task_work_logs';

    protected $fillable = [
        'tenant_id',
        'task_id',
        'project_id',
        'technician_id',
        'start_time',
        'end_time',
        'description',
        'materials_used',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }
}
