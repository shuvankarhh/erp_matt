<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mediaandDocumentation extends Model
{
    use HasFactory;
    protected $fillable = ['tenant_id', 'task_id', 'project_id', 'storage_provider_id', 'is_private_file', 'file_path', 'file_url', 'original_file_name'];
    protected $table = 'mediaand_documentations';
}
