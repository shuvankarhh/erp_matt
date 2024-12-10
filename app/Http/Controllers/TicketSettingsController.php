<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TicketSource;
use App\Services\Vendor\Tauhid\Pagination\Pagination;

class TicketSettingsController extends Controller
{
    public function index()
    {
        $ticket_sources = TicketSource::paginate();
        $pagination = Pagination::default($ticket_sources);
        
        return view('ticket_settings.ticket_settings_index',[
            'ticket_sources' => $ticket_sources,
            'pagination' => $pagination
        ]);
    }
}
