<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Services\Vendor\Tauhid\Encryption\Encryption;

class TicketContact extends Model
{
    use HasFactory;
    
    use SoftDeletes;
    protected $table = 'crm_ticket_contacts';

    // public function ticket()
    // {
    //     return $this->hasOne('App\Models\Ticket', 'id', 'ticket_id');
    // }

    public function contact()
    {
        return $this->hasOne('App\Models\Contact', 'id', 'contact_id');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }


}
