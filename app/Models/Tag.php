<?php

namespace App\Models;

use App\Models\ContactTag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Vendor\Tauhid\Encryption\Encryption;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'crm_tags';

    protected $fillable = ['name', 'type'];

    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'crm_contact_tags', 'tag_id', 'contact_id');
    }

    public function encrypted_id()
    {
        return Encryption::encrypt($this->id, 'aFGR$bm*1#12H*t1', 'aFGR$bm*1#12H*t1');
    }

    public static function decrypted_id($string)
    {
        return Encryption::decrypt($string, 'aFGR$bm*1#12H*t1', 'aFGR$bm*1#12H*t1');
    }
}
