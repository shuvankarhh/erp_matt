<?php

namespace App\Models;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pricelist extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'pricelists';

    protected $fillable = ['tenant_id', 'price'];

    public function encrypted_id()
    {
        return Crypt::encrypt($this->id);
    }

    public static function decrypted_id($string)
    {
        return Crypt::decrypt($string);
    }
}
