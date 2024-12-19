<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Vendor\Tauhid\Encryption\Encryption;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organization extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table =  'crm_organizations';

    protected $guarded = [];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function owner()
    {
        return $this->belongsTo(Staff::class, 'owner_id');
    }

    public function industry()
    {
        return  $this->belongsTo(Industry::class, 'industry_id');
    }

    public function timezone()
    {
        return $this->belongsTo(Timezone::class, 'timezone_id');
    }

    public function address()
    {
        return $this->belongsTo(OrganizationAddress::class, 'id', 'organization_id');
    }

    public function encrypted_id()
    {
        return Encryption::encrypt($this->id, 'kGhn$bm*1#12H*t1', 'kGhn$bm*1#12H*tg');
    }

    public static function decrypted_id($string)
    {
        return Encryption::decrypt($string, 'kGhn$bm*1#12H*t1', 'kGhn$bm*1#12H*tg');
    }
}
