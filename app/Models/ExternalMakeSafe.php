<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExternalMakeSafe extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'external_make_safes';

    protected $fillable = [
        'tenant_id',
        'project_id',
        'task_verified',
        'timestamp',
        'subcontractor_signature',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'timestamp' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = auth()->id();
            $model->updated_by = auth()->id();
        });

        static::updating(function ($model) {
            $model->updated_by = auth()->id();
        });
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
