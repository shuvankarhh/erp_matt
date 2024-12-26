<?php

namespace App\Http\Controllers;

use App\Models\Sale;

use App\Models\Task;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Contact;
use App\Models\TaskSale;
use App\Models\Timezone;
use App\Models\TaskTicket;
use App\Models\TaskContact;
use App\Models\Organization;
use App\Models\TicketSource;
use Illuminate\Http\Request;
use App\Models\SupportPipeline;
use App\Models\TaskOrganization;
use Illuminate\Support\Facades\DB;
use App\Models\SupportPipelineStage;
use Illuminate\Support\Facades\Auth;
use App\Services\Vendor\Tauhid\Pagination\Pagination;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    public function create()
    {
        $types = [
            1 => 'To-do',
            2 => 'Call',
            3 => 'Email'
        ];

        $priorities = [
            1 => 'Low',
            2 => 'Medium',
            3 => 'High'
        ];

        $completion_statuses = [
            1 => 'Not Started',
            2 => 'In Progress',
            3 => 'On Hold',
            4 => 'Canceled',
            5 => 'Finished'
        ];

        // $users = User::with('staff')->where('user_role_id', 3)->get();

        $users = User::with('staff')
            ->where('user_role_id', 3)
            ->get()
            ->pluck('task_assigned_to', 'id');

        $timezones = Timezone::pluck('name', 'id');
        $contacts = Contact::pluck('name', 'id');
        $organizations = Organization::pluck('name', 'id');
        $sales = Sale::pluck('name', 'id');
        $tickets = Ticket::pluck('name', 'id');

        $html = view('tasks.create', [
            'types' => $types,
            'priorities' => $priorities,
            'users' => $users,
            'completion_statuses' => $completion_statuses,
            'timezones' => $timezones,
            'contacts' => $contacts,
            'organizations' => $organizations,
            'sales' => $sales,
            'tickets' => $tickets
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'priority' => 'required',
            'assigned_to' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'completion_status' => 'required',
            'timezone_id' => 'required',
            'description' => 'nullable',
            // 'contact_id' => 'nullable',
            // 'organization_id' => 'nullable',
            // 'sale_id' => 'nullable',
            // 'ticket_id' => 'nullable',
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $task = new Task;
        $task->tenant_id = $tenant_id;
        $task->name = $request->name;
        $task->type = $request->type;
        $task->priority = $request->priority;
        $task->assigned_to = $request->assigned_to;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->completion_status = $request->completion_status;
        $task->timezone_id = $request->timezone_id;
        $task->description = $request->description;
        $task->save();

        $contactIds = $request->contact_id;
        if ($contactIds) {
            foreach ($contactIds as $id) {
                $ticket_contact = new TaskContact();
                $ticket_contact->task_id = $task->id;
                $ticket_contact->contact_id = $id;
                $ticket_contact->save();
            }
        }

        $organizationId = $request->organization_id;
        if ($organizationId) {
            foreach ($organizationId as $id) {
                $ticket_organization = new TaskOrganization();
                $ticket_organization->task_id = $task->id;
                $ticket_organization->organization_id = $id;
                $ticket_organization->save();
            }
        }

        // $saleId = $request->sales_id;
        $saleId = $request->sale_id;
        if ($organizationId) {
            foreach ($saleId as $id) {
                $ticket_sale = new TaskSale();
                $ticket_sale->task_id = $task->id;
                $ticket_sale->sale_id = $id;
                $ticket_sale->save();
            }
        }

        // $saleId = $request->tickets_id;
        $saleId = $request->ticket_id;
        if ($organizationId) {
            foreach ($saleId as $id) {

                $ticket_sale = new TaskTicket();
                $ticket_sale->task_id = $task->id;
                $ticket_sale->ticket_id = $id;
                $ticket_sale->save();
            }
        }

        session(['success_message' => 'Task has been added successfully!!!']);

        // return response()->json(array('response_type' => 1, 'success_message' => 'Ticket has been created successfully'));

        return redirect()->back();
    }

    public function show($id)
    {
        $id = Task::decrypted_id($id);
        $task = Task::with('user')->find($id);
        $organization = TaskOrganization::with('organization')->where('task_id', $id)->first();
        $contactIds = TaskContact::with('contact')->where('task_id', $id)->get();
        $saleIds = TaskSale::with('sale')->where('task_id', $id)->first();
        $ticketIds = TaskTicket::with('ticket')->where('task_id', $id)->first();

        $response_body =  view('tasks._task_show_modal', [
            'task' => $task,
            'contactIds' => $contactIds,
            'organization' => $organization,
            'saleIds' => $saleIds,
            'ticketIds' => $ticketIds,
        ]);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function edit($id)
    {
        $types = [
            1 => 'To-do',
            2 => 'Call',
            3 => 'Email'
        ];

        $priorities = [
            1 => 'Low',
            2 => 'Medium',
            3 => 'High'
        ];

        $completion_statuses = [
            1 => 'Not Started',
            2 => 'In Progress',
            3 => 'On Hold',
            4 => 'Canceled',
            5 => 'Finished'
        ];

        $decryptedTaskId = Task::decrypted_id($id);
        $task = Task::find($decryptedTaskId);

        $users = User::with('staff')
            ->where('user_role_id', 3)
            ->get()
            ->pluck('task_assigned_to', 'id');

        $timezones = Timezone::pluck('name', 'id');
        $contacts = Contact::pluck('name', 'id');
        $organizations = Organization::pluck('name', 'id');
        $sales = Sale::pluck('name', 'id');
        $tickets = Ticket::pluck('name', 'id');

        $organizations = TaskOrganization::with('organization')->where('task_id', $id)->get();
        $contactIds = TaskContact::with('contact')->where('task_id', $id)->get();
        $saleIds = TaskSale::with('sale')->where('task_id', $id)->get();
        $ticketIds = TaskTicket::with('ticket')->where('task_id', $id)->get();

        $html = view('tasks.edit', [
            'task' => $task,
            'types' => $types,
            'priorities' => $priorities,
            'users' => $users,
            'completion_statuses' => $completion_statuses,
            'timezones' => $timezones,
            'contacts' => $contacts,
            'organizations' => $organizations,
            'sales' => $sales,
            'tickets' => $tickets,
            'contactIds' => $contactIds,
            'organizationIds' => $organizations,
            'saleIds' => $saleIds,
            'ticketIds' => $ticketIds
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'priority' => 'required',
            'assigned_to' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'completion_status' => 'required',
            'timezone_id' => 'required',
            'description' => 'nullable',
            // 'contact_id' => 'nullable',
            // 'organization_id' => 'nullable',
            // 'sale_id' => 'nullable',
            // 'ticket_id' => 'nullable',
        ]);

        $decryptedTaskId = Task::decrypted_id($id);
        $task = Task::find($decryptedTaskId);
        $task->name = $request->name;
        $task->type = $request->type;
        $task->priority = $request->priority;
        $task->assigned_to = $request->assigned_to;
        $task->completion_status = $request->completion_status;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->timezone_id = $request->timezone_id;
        $task->description = $request->description;
        $task->save();

        $contactIds = $request->contact_id;
        if ($contactIds) {
            foreach ($contactIds as $con_id) {
                $ticket_contact = TaskContact::where('task_id', $task->id)->where('contact_id', $con_id)->first();
                if (isset($ticket_contact)) {
                } else {
                    $ticket_contact = new TaskContact();
                    $ticket_contact->task_id = $task->id;
                    $ticket_contact->contact_id = $con_id;
                    $ticket_contact->save();
                }
            }
        }

        $ticketContactIds = TaskContact::where('task_id', $task->id)->pluck('contact_id');
        if ($ticketContactIds) {
            $missingContacts = $ticketContactIds->diff($contactIds)->all();
            foreach ($missingContacts as $missingContact) {
                TaskContact::where('task_id', $task->id)->where('contact_id', $missingContact)->delete();
            }
        }


        $organizationId = $request->organization_id;
        if ($organizationId) {
            foreach ($organizationId as $id) {
                $ticket_organization = TaskOrganization::where('task_id', $task->id)->where('organization_id', $id)->first();
                if (isset($ticket_organization)) {
                } else {
                    $ticket_organization = new TaskOrganization();
                    $ticket_organization->task_id = $task->id;
                    $ticket_organization->organization_id = $id;
                    $ticket_organization->save();
                }
            }
        }

        $ticketOrganizationIds = TaskOrganization::where('task_id', $task->id)->pluck('organization_id');
        if ($ticketOrganizationIds) {
            $missingOrganizations = $ticketOrganizationIds->diff($organizationId)->all();
            foreach ($missingOrganizations as $missingOrganization) {
                TaskOrganization::where('task_id', $task->id)->where('organization_id', $missingOrganization)->delete();
            }
        }


        $saleId = $request->sales_id;
        if ($saleId) {
            foreach ($saleId as $id) {
                $ticket_sale = TaskSale::where('task_id', $task->id)->where('sale_id', $id)->first();
                if (isset($ticket_sale)) {
                } else {
                    $ticket_sale = new TaskSale();
                    $ticket_sale->task_id = $task->id;
                    $ticket_sale->sale_id = $id;
                    $ticket_sale->save();
                }
            }
        }
        $saleIds = TaskSale::where('task_id', $id)->pluck('sale_id');
        if ($saleIds) {
            $missingSales = $saleIds->diff($saleId)->all();
            foreach ($missingSales as $missingSale) {
                TaskSale::where('task_id', $id)->where('sale_id', $missingSale)->delete();
            }
        }

        session(['success_message' => 'Task has been updated successfully!!!']);

        // return response()->json(array('response_type' => 1));

        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $decryptedTaskId = Task::decrypted_id($id);
        Task::find($decryptedTaskId)->delete();

        session(['success_message' => 'Task has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }

    public function searchTickets(Request $request)
    {
        $input = $request->input('term');
        if ($input != null) {
            $results = [];
            $queries = DB::table('crm_tickets')
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
