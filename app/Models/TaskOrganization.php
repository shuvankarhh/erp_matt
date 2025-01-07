<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskOrganization extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'crm_task_organizations';

    protected $fillable = ['tenant_id', 'task_id', 'organization_id'];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }
}
