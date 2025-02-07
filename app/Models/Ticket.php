<?php

namespace App\Models;

use App\Models\TicketSource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Services\Vendor\Tauhid\Encryption\Encryption;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'crm_tickets';

    public function encrypted_id()
    {
        return Encryption::encrypt($this->id, 'kGll$bm*x#92H*op', 'kGll$bm*x#92H*op');
    }

    public static function decrypted_id($string)
    {
        return Encryption::decrypt($string, 'kGll$bm*x#92H*op', 'kGll$bm*x#92H*op');
    }

    public function source()
    {
        return $this->belongsTo(TicketSource::class, 'source_id', 'id');
    }

    public function trashed_support_pipeline_stage()
    {
        return $this->hasOne('App\Models\SupportPipelineStage', 'id', 'pipeline_stage_id')->withTrashed();
    }

    public function trashed_support_pipeline()
    {
        return $this->hasOne('App\Models\SupportPipeline', 'id', 'pipeline_id')->withTrashed();
    }

    public function trashed_ticket_source()
    {
        return $this->hasOne('App\Models\TicketSource', 'id', 'source_id')->withTrashed();
    }

    public function trashed_staff()
    {
        return $this->hasOne('App\Models\Staff', 'id', 'owner_id')->withTrashed();
    }

    public function contact(): HasOne
    {
        return $this->hasOne(TicketContact::class);
    }

    public function organization(): HasOne
    {
        return $this->hasOne(TicketOrganization::class);
    }

    public function sale(): HasOne
    {
        return $this->hasOne(TicketSale::class);
    }
}
