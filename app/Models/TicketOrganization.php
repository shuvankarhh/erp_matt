<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Vendor\Tauhid\Encryption\Encryption;

class TicketOrganization extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'crm_ticket_organizations';

    public function organization()
    {
        return $this->hasOne('App\Models\Organization', 'id', 'organization_id');
    }    
    
    public function ticket()
    {
        return $this->hasOne('App\Models\Ticket', 'id', 'ticket_id');
    }
}
