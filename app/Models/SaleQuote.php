<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Vendor\Tauhid\Encryption\Encryption;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleQuote extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "crm_sale_quotes";

    protected $guarded = [];

    public function encrypted_id()
    {
        return Encryption::encrypt($this->id, 'kGhn$bm*1#12H*t1', 'kGhn$bm*1#12H*tg');
    }
    public static function decrypted_id($string)
    {
        return Encryption::decrypt($string, 'kGhn$bm*1#12H*t1', 'kGhn$bm*1#12H*tg');
    }

    public function timezone(): BelongsTo
    {
        return $this->belongsTo(Timezone::class);
    }

    public function pipeline(): BelongsTo
    {
        return $this->belongsTo(SalesPipeline::class);
    }

    public function pipelineStage(): BelongsTo
    {
        return $this->belongsTo(SalesPipelineStage::class);
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

    public function solutions()
    {
        return $this->belongsToMany(Solution::class, 'crm_sale_solutions')
            ->withPivot('quantity', 'discount_percentage')
            ->withTimestamps();
    }
}
