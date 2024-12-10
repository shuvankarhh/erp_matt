<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Vendor\Tauhid\Encryption\Encryption;

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

    public function trashed_support_pipeline_stage()
    {
        return $this->hasOne('App\Models\SupportPipelineStage','id', 'pipeline_stage_id')->withTrashed();
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
}
