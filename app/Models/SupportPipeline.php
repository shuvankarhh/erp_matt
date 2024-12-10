<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Vendor\Tauhid\Encryption\Encryption;

class SupportPipeline extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'crm_support_pipelines';
    
    public function encrypted_id()
    {
        return Encryption::encrypt($this->id, 'kGll$bm*1#12H*89', 'kGll$bm*1#12H*89');
    }

    public static function decrypted_id($string)
    {
        return Encryption::decrypt($string, 'kGll$bm*1#12H*89', 'kGll$bm*1#12H*89');
    }
}
