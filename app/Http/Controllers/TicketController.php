<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Ticket;
use App\Models\Contact;
use App\Models\TicketSale;
use App\Models\Organization;
use App\Models\Sale;
use App\Models\TicketSource;
use Illuminate\Http\Request;
use App\Models\TicketContact;
use App\Models\SupportPipeline;
use App\Models\TicketOrganization;
use Illuminate\Support\Facades\DB;
use App\Models\SupportPipelineStage;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('source')->paginate();

        return view('tickets.index', [
            'tickets' => $tickets
        ]);
    }

    public function create()
    {
        $priorities = [
            1 => 'Low',
            2 => 'Medium',
            3 => 'High'
        ];

        $ticket_sources = TicketSource::pluck('name', 'id');
        $support_pipelines = SupportPipeline::pluck('name', 'id');
        $support_pipeline_stages = SupportPipelineStage::pluck('name', 'id');
        $staffs = Staff::pluck('name', 'id');
        $contacts = Contact::pluck('name', 'id');
        $organizations = Organization::pluck('name', 'id');
        $sales = Sale::pluck('name', 'id');

        $html = view('tickets.create', [
            'support_pipelines' => $support_pipelines,
            'support_pipeline_stages' => $support_pipeline_stages,
            'ticket_sources' => $ticket_sources,
            'priorities' => $priorities,
            'staffs' => $staffs,
            'contacts' => $contacts,
            'organizations' => $organizations,
            'sales' => $sales
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pipeline_id' => 'required',
            'pipeline_stage_id' => 'required',
            'source_id' => 'required',
            'description' => 'required',
            'owner_id' => 'required',
            'priority' => 'required',
            'contact_id' => 'nullable',
            'organization_id' => 'nullable',
            'sale_id' => 'nullable',
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $ticket = new Ticket;
        $ticket->tenant_id = $tenant_id;
        $ticket->name = $request->name;
        $ticket->pipeline_id = $request->pipeline_id;
        $ticket->pipeline_stage_id = $request->pipeline_stage_id;
        $ticket->description = $request->description;
        $ticket->source_id = $request->source_id;
        $ticket->owner_id = $request->owner_id;
        $ticket->priority = $request->priority;
        $ticket->save();

        if ($request->filled('contact_id')) {
            TicketContact::create([
                'tenant_id' => $tenant_id,
                'ticket_id' => $ticket->id,
                'contact_id' => $request->input('contact_id'),
            ]);
        }

        if ($request->filled('organization_id')) {
            TicketOrganization::create([
                'tenant_id' => $tenant_id,
                'ticket_id' => $ticket->id,
                'organization_id' => $request->input('organization_id'),
            ]);
        }

        if ($request->filled('sale_id')) {
            TicketSale::create([
                'tenant_id' => $tenant_id,
                'ticket_id' => $ticket->id,
                'sale_id' => $request->input('sale_id'),
            ]);
        }

        session(['success_message' => 'Ticket has been added successfully!!!']);

        return redirect()->back();
    }

    public function show($id)
    {
        $id = Ticket::decrypted_id($id);
        $ticket = Ticket::with('trashed_support_pipeline_stage', 'trashed_support_pipeline', 'trashed_ticket_source', 'trashed_staff')->find($id);
        $organizations = Organization::all();
        $contacts = Contact::all();
        $ticket_sources = TicketSource::all();
        $support_pipelines = SupportPipeline::all();
        $support_pipeline_stages = SupportPipelineStage::all();
        $staffs = Staff::all();
        $org = TicketOrganization::with('organization')->where('ticket_id', $id)->first();
        $contactIds = TicketContact::with('ticket')->where('ticket_id', $id)->get();

        $response_body =  view('tickets._ticket_show_modal', [
            'staffs' => $staffs,
            'ticket_sources' => $ticket_sources,
            'support_pipelines' => $support_pipelines,
            'support_pipeline_stages' => $support_pipeline_stages,
            'ticket' => $ticket,
            'organizations' => $organizations,
            'org' => $org,
            'contactIds' => $contactIds,
            'contacts' => $contacts
        ]);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function edit($id)
    {
        $priorities = [
            1 => 'Low',
            2 => 'Medium',
            3 => 'High'
        ];

        $id = Ticket::decrypted_id($id);
        $ticket = Ticket::with('source', 'contact', 'organization', 'sale')->find($id);
        $ticket_sources = TicketSource::pluck('name', 'id');
        $support_pipelines = SupportPipeline::pluck('name', 'id');
        $support_pipeline_stages = SupportPipelineStage::pluck('name', 'id');
        $staffs = Staff::pluck('name', 'id');
        $contacts = Contact::pluck('name', 'id');
        $organizations = Organization::pluck('name', 'id');
        $sales = Sale::pluck('name', 'id');

        $org = TicketOrganization::where('ticket_id', $id)->get();
        $contactIds = TicketContact::with('ticket')->where('ticket_id', $id)->get();
        $saleIds = TicketSale::where('ticket_id', $id)->get();

        $html = view('tickets.edit', [
            'ticket' => $ticket,
            'ticket_sources' => $ticket_sources,
            'support_pipelines' => $support_pipelines,
            'support_pipeline_stages' => $support_pipeline_stages,
            'priorities' => $priorities,
            'staffs' => $staffs,
            'contacts' => $contacts,
            'organizations' => $organizations,
            'sales' => $sales,
            'org' => $org,
            'contactIds' => $contactIds,
            'contacts' => $contacts,
            'saleIds' => $saleIds
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pipeline_id' => 'required',
            'pipeline_stage_id' => 'required',
            'source_id' => 'required',
            'description' => 'required',
            'owner_id' => 'required',
            'priority' => 'required',
            'contact_id' => 'nullable',
            'organization_id' => 'nullable',
            'sale_id' => 'nullable',
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $decryptedTicketId = Ticket::decrypted_id($id);
        $ticket = Ticket::find($decryptedTicketId);
        $ticket->tenant_id = $tenant_id;
        $ticket->name = $request->name;
        $ticket->pipeline_id = $request->pipeline_id;
        $ticket->pipeline_stage_id = $request->pipeline_stage_id;
        $ticket->source_id = $request->source_id;
        $ticket->description = $request->description;
        $ticket->owner_id = $request->owner_id;
        $ticket->priority = $request->priority;
        $ticket->save();

        if ($request->filled('contact_id')) {
            TicketContact::updateOrCreate(
                [
                    'ticket_id' => $ticket->id,
                ],
                [
                    'tenant_id' => $tenant_id,
                    'contact_id' => $request->input('contact_id'),
                ]
            );
        }

        if ($request->filled('organization_id')) {
            TicketOrganization::updateOrCreate(
                [
                    'ticket_id' => $ticket->id,
                ],
                [
                    'tenant_id' => $tenant_id,
                    'organization_id' => $request->input('organization_id'),
                ]
            );
        }

        if ($request->filled('sale_id')) {
            TicketSale::updateOrCreate(
                [
                    'ticket_id' => $ticket->id,
                ],
                [
                    'tenant_id' => $tenant_id,
                    'sale_id' => $request->input('sale_id'),
                ]
            );
        }


        session(['success_message' => 'Ticket has been updated successfully!!!']);

        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $decryptedTicketId = Ticket::decrypted_id($id);
        $ticket = Ticket::find($decryptedTicketId);
        $ticket->delete();

        if ($ticket->contact) {
            $ticket->contact->delete();
        }

        if ($ticket->organization) {
            $ticket->organization->delete();
        }

        if ($ticket->sale) {
            $ticket->sale->delete();
        }

        session(['success_message' => 'Ticket has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }

    public function searchSales(Request $request)
    {
        $input = $request->input('term');
        if ($input != null) {
            $results = [];
            $queries = DB::table('crm_sales')
                ->where('name', 'LIKE', '%' . $input . '%')
                ->limit(5)
                ->select('id', 'name')
                ->get();

            foreach ($queries as $query) {
                $results[] = ['id' => $query->id, 'value' => $query->name];
            }
            return response()->json($results);
        }
    }
}
