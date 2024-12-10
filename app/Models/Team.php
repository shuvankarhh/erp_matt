<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Services\Vendor\Tauhid\Encryption\Encryption;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'crm_teams';

    protected $guarded = [];

    public function encrypted_id()
    {
        return Encryption::encrypt($this->id, 'aFGR$bm*1#12H*t1', 'aFGR$bm*1#12H*t1');
    }

    public static function decrypted_id($string)
    {
        return Encryption::decrypt($string, 'aFGR$bm*1#12H*t1', 'aFGR$bm*1#12H*t1');
    }
}
