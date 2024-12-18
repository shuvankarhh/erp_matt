<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Vendor\Tauhid\Encryption\Encryption;

class Staff extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'crm_staffs';
    protected $fillable = ['name', 'short_name', 'staff_reference_id', 'phone_code', 'phone', 'line_manager', 'gender', 'address', 'team_id', 'designation_id'];

    protected $perPage = 15;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function user()
    // {
    //     return $this->hasOne('App\Models\User', 'id', 'user_id');
    // }

    public function team()
    {
        return $this->hasOne('App\Models\Team', 'id', 'team_id')->withTrashed();
    }

    public function designation()
    {
        return $this->hasOne('App\Models\Designation', 'id', 'designation_id');
    }
    public function designationWithTrashed()
    {
        return $this->hasOne('App\Models\Designation', 'id', 'designation_id')->withTrashed();
    }

    public function profile_photos()
    {
        return $this->hasOne('App\Models\ProfilePhoto', 'user_id', 'user_id');
    }


    public function encrypted_id()
    {
        return Encryption::encrypt($this->id, 'kGhn$bm*1#12H*t1', 'kGhn$bm*1#12H*t1');
    }

    public static function decrypted_id($string)
    {
        return Encryption::decrypt($string, 'kGhn$bm*1#12H*t1', 'kGhn$bm*1#12H*t1');
    }

    public function lineManager()
    {
        return $this->belongsTo(Staff::class, 'line_manager');
    }
}
