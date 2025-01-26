<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotesandAnnotations extends Model
{
    use HasFactory;

    public function taskid()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function materialid()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

}
