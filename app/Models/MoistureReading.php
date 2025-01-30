<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MoistureReading extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'task_moisture_readings';

    protected $fillable = [
        'tenant_id',
        'task_id',
        'project_id',
        'reading_value',
        'recorded_at',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
