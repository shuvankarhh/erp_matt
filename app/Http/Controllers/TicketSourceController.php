<?php

namespace App\Http\Controllers;

use App\Models\TicketSource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketSourceController extends Controller
{
    public function index()
    {
        $ticket_sources = TicketSource::paginate(10);

        return view('ticket_sources.index', compact('ticket_sources'));
    }

    public function create()
    {
        $html = view('ticket_sources.create')->render();

        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $ticket_source = new TicketSource;
        $ticket_source->tenant_id = $tenant_id;
        $ticket_source->name = $request->name;
        $ticket_source->save();

        session(['success_message' => 'Ticket source has been added successfully!!!']);

        return redirect()->back();
    }

    public function edit($id)
    {
        $id = TicketSource::decrypted_id($id);
        $ticket_source = TicketSource::find($id);

        $html = view('ticket_sources.edit', [
            'ticket_source' => $ticket_source,
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $id = TicketSource::decrypted_id($id);
        $ticket_source = TicketSource::find($id);
        $ticket_source->name = $request->name;
        $ticket_source->save();

        session(['success_message' => 'Ticket source has been updated successfully!!!']);

        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $id = TicketSource::decrypted_id($id);
        TicketSource::find($id)->delete();

        session(['success_message' => 'Ticket source has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }
}
