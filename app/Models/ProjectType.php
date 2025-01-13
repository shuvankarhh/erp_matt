<?php

namespace App\Models;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectType extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'project_types';

    protected $fillable = ['tenant_id', 'name'];

    public function encrypted_id()
    {
        return Crypt::encrypt($this->id);
    }

    public static function decrypted_id($string)
    {
        return Crypt::decrypt($string);
    }
}
