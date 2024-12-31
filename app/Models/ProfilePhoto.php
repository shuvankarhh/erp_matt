<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfilePhoto extends Model
{
    use HasFactory;

    protected $table = 'crm_profile_photos';

    protected $guarded = [];

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

    public function storage_provider()
    {
        return $this->belongsTo(StorageProvider::class, 'storage_provider_id', 'id');
    }
}
