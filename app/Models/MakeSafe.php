<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MakeSafe extends Model
{

    use HasFactory, SoftDeletes;

    // protected $table = 'make_safes';

    protected $fillable = [
        'tenant_id',
        'project_id',
        'form_id',
        // 'structural_stabilization',
        // 'electrical_isolation',
        // 'debris_removal',
        'checklist',
        'additional_comments',
        'media_uploads',
        'completion_date',
        'technician_signature',
        'task_verified',
        'subcontractor_signature',
        'timestamp',
    ];

    protected $casts = [
        'checklist' => 'array',
        'media_uploads' => 'array',
        'completion_date' => 'date',
        'timestamp' => 'datetime',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // public function technician()
    // {
    //     return $this->belongsTo(User::class, 'technician_signature');
    // }

    // public function subcontractor()
    // {
    //     return $this->belongsTo(User::class, 'subcontractor_signature');
    // }

    public function scopeInternal($query)
    {
        return $query->where('form_id', 1);
    }

    public function scopeExternal($query)
    {
        return $query->where('form_id', 2);
    }
}
