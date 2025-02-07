<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Vendor\Tauhid\Encryption\Encryption;

class SalesPipeline extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'crm_sales_pipelines';

    protected $fillable = ['tenant_id', 'name', 'is_default', 'updated_at'];

    public function encrypted_id()
    {
        return Encryption::encrypt($this->id, 'kGhn$xx*1#12H*t1', 'kGhn$xx*1#12H*tg');
    }

    public static function decrypted_id($string)
    {
        return Encryption::decrypt($string, 'kGhn$xx*1#12H*t1', 'kGhn$xx*1#12H*tg');
    }
}
