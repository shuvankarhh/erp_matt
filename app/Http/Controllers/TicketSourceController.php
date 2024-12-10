<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketSource;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class TicketSourceController extends Controller
{
    public function create()
    {
        
        $response_body =  view('ticket_settings._ticket_source_create_modal', []);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function store(Request $request)
    {
        $validation_rules = [
            'name' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);
        
        if(ErrorMessage::has_error())
        {
            $response_body_html =  view('vendor._errors', [
                'errors' => ErrorMessage::$errors,
            ]);

            return response()->json(array('response_type'=> 0, 'response_body_html'=> mb_convert_encoding($response_body_html, 'UTF-8', 'ISO-8859-1')));
        }

        $ticket_source = new TicketSource;
        $ticket_source->name = $request->name;
        $ticket_source->save();

        session(['success_message' => 'Ticket Source has been created successfully']);
        return response()->json(array('response_type'=> 1));
    }

    public function edit($id)
    {
        $id = TicketSource::decrypted_id($id);
        $ticket_source = TicketSource::find($id);

        $response_body =  view('ticket_settings._ticket_source_edit_modal', [
            'ticket_source' => $ticket_source,
        ]);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }
    public function update(Request $request, $id)
    {
        $validation_rules = [
            'name' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);
        
        if(ErrorMessage::has_error())
        {
            $response_body_html =  view('vendor._errors', [
                'errors' => ErrorMessage::$errors,
            ]);

            return response()->json(array('response_type'=> 0, 'response_body_html'=> mb_convert_encoding($response_body_html, 'UTF-8', 'ISO-8859-1')));
        }
        $id = TicketSource::decrypted_id($id);
        $ticket_source = TicketSource::find($id);
        $ticket_source->name = $request->name;
        $ticket_source->save();

        session(['success_message' => 'Ticket Source has been updated successfully']);

        return response()->json(array('response_type'=> 1));
    }
    public function destroy(string $id)
    {
        $id = TicketSource::decrypted_id($id);
        TicketSource::find($id)->delete();
        session(['delete_success_message' => 'Ticket Source has been deleted successfully']);
        return response()->json(array('response_type' => 1));
    }



}
