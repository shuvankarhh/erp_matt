<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';

    public function contact()
    {
        return $this->hasOne(Contact::class, 'id', 'contact_id');
    }

}
