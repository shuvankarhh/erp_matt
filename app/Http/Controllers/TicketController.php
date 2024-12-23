<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Staff;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use App\Models\TicketSource;
use App\Models\Contact;
use App\Models\TicketSale;
use App\Models\TicketContact;
use App\Models\TicketOrganization;
use App\Models\Organization;
use App\Models\SupportPipeline;
use App\Models\SupportPipelineStage;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Services\Vendor\Tauhid\Pagination\Pagination;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        // $pagination = Pagination::default($tickets);
        return view('tickets.index', [
            'tickets' => $tickets,
            // 'pagination' => $pagination,
        ]);
    }

    public function create()
    {
        $ticket_sources = TicketSource::all();
        $support_pipelines = SupportPipeline::all();
        $support_pipeline_stages = SupportPipelineStage::all();
        $staffs = Staff::all();
        $contacts = Contact::all();
        $organizations = Organization::all();

        // $response_body =  view('tickets._ticket_create_modal', [
        //     'contacts' => $contacts,
        //     'organizations' => $organizations,
        //     'staffs' => $staffs,
        //     'ticket_sources' => $ticket_sources,
        //     'support_pipelines' => $support_pipelines,
        //     'support_pipeline_stages' => $support_pipeline_stages,
        // ]);

        // return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));

        $html = view('tickets.create', [
            'contacts' => $contacts,
            'organizations' => $organizations,
            'staffs' => $staffs,
            'ticket_sources' => $ticket_sources,
            'support_pipelines' => $support_pipelines,
            'support_pipeline_stages' => $support_pipeline_stages,
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $validation_rules = [
            'name' => 'required',
            'pipeline_id' => 'required',
            'pipeline_stage_id' => 'required',
            'description' => 'required',
            'source_id' => 'required',
            'owner_id' => 'required',
            'contact_id' => 'required',
            'priority' => 'required',
            'organization_id' => 'required',
            'sales_id' => 'required',
        ];

        $validation_names = [
            'name' => 'name',
            'pipeline_id' => 'pipeline',
            'pipeline_stage_id' => 'pipeline stage',
            'description' => 'description',
            'source_id' => 'source',
            'owner_id' => 'owner',
            'contact_id' => 'contact',
            'priority' => 'priority',
            'organization_id' => 'organization',
            'sales_id' => 'sales',
        ];

        Validation::validate($request, $validation_rules, [], $validation_names);

        if (ErrorMessage::has_error()) {
            $response_body_html =  view('vendor._errors', [
                'errors' => ErrorMessage::$errors,
            ]);

            return response()->json(array('response_type' => 0, '_old_input' => $request->all(), 'response_body_html' => mb_convert_encoding($response_body_html, 'UTF-8', 'ISO-8859-1')));
        }
        $ticket = new Ticket;
        $ticket->name = $request->name;
        $ticket->pipeline_id = $request->pipeline_id;
        $ticket->pipeline_stage_id = $request->pipeline_stage_id;
        $ticket->description = $request->description;
        $ticket->source_id = $request->source_id;
        $ticket->owner_id = $request->owner_id;
        $ticket->priority = $request->priority;
        $ticket->save();

        $contactIds = $request->contact_id;
        if ($contactIds) {
            foreach ($contactIds as $id) {
                $ticket_contact = new TicketContact();
                $ticket_contact->ticket_id = $ticket->id;
                $ticket_contact->contact_id = $id;
                $ticket_contact->save();
            }
        }

        $organizationId = $request->organization_id;
        if ($organizationId) {
            foreach ($organizationId as $id) {
                $ticket_organization = new TicketOrganization();
                $ticket_organization->ticket_id = $ticket->id;
                $ticket_organization->organization_id = $id;
                $ticket_organization->save();
            }
        }

        $saleId = $request->sales_id;
        if ($organizationId) {
            foreach ($saleId as $id) {
                $ticket_sale = new TicketSale();
                $ticket_sale->ticket_id = $ticket->id;
                $ticket_sale->sale_id = $id;
                $ticket_sale->save();
            }
        }

        session(['success_message' => 'Ticket has been created successfully']);
        return response()->json(array('response_type' => 1, 'success_message' => 'Ticket has been created successfully'));
    }

    public function edit($id)
    {
        $id = Ticket::decrypted_id($id);
        $ticket = Ticket::find($id);
        $organizations = Organization::all();
        $contacts = Contact::all();
        $ticket_sources = TicketSource::all();
        $support_pipelines = SupportPipeline::all();
        $support_pipeline_stages = SupportPipelineStage::all();
        $staffs = Staff::all();
        $org = TicketOrganization::where('ticket_id', $id)->get();
        $contactIds = TicketContact::with('ticket')->where('ticket_id', $id)->get();
        $saleIds = TicketSale::where('ticket_id', $id)->get();
        $response_body =  view('tickets._ticket_edit_modal', [
            'staffs' => $staffs,
            'ticket_sources' => $ticket_sources,
            'support_pipelines' => $support_pipelines,
            'support_pipeline_stages' => $support_pipeline_stages,
            'ticket' => $ticket,
            'organizations' => $organizations,
            'org' => $org,
            'contactIds' => $contactIds,
            'contacts' => $contacts,
            'saleIds' => $saleIds
        ]);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
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


    public function update(Request $request, $id)
    {
        $validation_rules = [
            'name' => 'required',
            'pipeline_id' => 'required',
            'pipeline_stage_id' => 'required',
            'description' => 'required',
            'source_id' => 'required',
            'owner_id' => 'required',
            'contact_id' => 'required',
            'organization_id' => 'required',
            'sales_id' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            $response_body_html =  view('vendor._errors', [
                'errors' => ErrorMessage::$errors,
            ]);

            return response()->json(array('response_type' => 0, '_old_input' => $request->all(), 'response_body_html' => mb_convert_encoding($response_body_html, 'UTF-8', 'ISO-8859-1')));
        }

        $ticket_id = Ticket::decrypted_id($id);
        $ticket = Ticket::find($ticket_id);
        $ticket->name = $request->name;
        $ticket->pipeline_id = $request->pipeline_id;
        $ticket->pipeline_stage_id = $request->pipeline_stage_id;
        $ticket->description = $request->description;
        $ticket->source_id = $request->source_id;
        $ticket->owner_id = $request->owner_id;
        $ticket->priority = $request->priority;
        $ticket->save();

        $contactIds = $request->contact_id;
        if ($contactIds) {
            foreach ($contactIds as $con_id) {
                $ticket_contact = TicketContact::where('ticket_id', $ticket_id)->where('contact_id', $con_id)->first();
                if (isset($ticket_contact)) {
                } else {
                    $ticket_contact = new TicketContact();
                    $ticket_contact->ticket_id = $ticket_id;
                    $ticket_contact->contact_id = $con_id;
                    $ticket_contact->save();
                }
            }
        }

        $ticketContactIds = TicketContact::where('ticket_id', $ticket_id)->pluck('contact_id');
        if ($ticketContactIds) {
            $missingContacts = $ticketContactIds->diff($contactIds)->all();
            foreach ($missingContacts as $missingContact) {
                TicketContact::where('ticket_id', $ticket_id)->where('contact_id', $missingContact)->delete();
            }
        }


        $organizationId = $request->organization_id;
        if ($organizationId) {
            foreach ($organizationId as $id) {

                $ticket_organization = TicketOrganization::where('ticket_id', $ticket_id)->where('organization_id', $id)->first();
                if (isset($ticket_organization)) {
                } else {
                    $ticket_organization = new TicketOrganization();
                    $ticket_organization->ticket_id = $ticket->id;
                    $ticket_organization->organization_id = $id;
                    $ticket_organization->save();
                }
            }
        }

        $ticketOrganizationIds = TicketOrganization::where('ticket_id', $ticket_id)->pluck('organization_id');
        if ($ticketOrganizationIds) {
            $missingOrganizations = $ticketOrganizationIds->diff($organizationId)->all();
            foreach ($missingOrganizations as $missingOrganization) {
                TicketOrganization::where('ticket_id', $ticket_id)->where('organization_id', $missingOrganization)->delete();
            }
        }


        $saleId = $request->sales_id;
        if ($saleId) {
            foreach ($saleId as $id) {
                $ticket_sale = TicketSale::where('ticket_id', $ticket_id)->where('sale_id', $id)->first();
                if (isset($ticket_sale)) {
                } else {
                    $ticket_sale = new TicketSale();
                    $ticket_sale->ticket_id = $ticket->id;
                    $ticket_sale->sale_id = $id;
                    $ticket_sale->save();
                }
            }
        }
        $saleIds = TicketSale::where('ticket_id', $ticket_id)->pluck('sale_id');
        if ($saleIds) {
            $missingSales = $saleIds->diff($saleId)->all();
            foreach ($missingSales as $missingSale) {
                TicketSale::where('ticket_id', $ticket_id)->where('sale_id', $missingSale)->delete();
            }
        }

        session(['success_message' => 'Ticket Source has been updated successfully']);

        return response()->json(array('response_type' => 1));
    }
    public function destroy(string $id)
    {
        $id = Ticket::decrypted_id($id);
        Ticket::find($id)->delete();
        session(['delete_success_message' => 'Ticket Source has been deleted successfully']);
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
