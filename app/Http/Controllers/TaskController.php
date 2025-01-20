<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Task;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Project;
use App\Models\Contact;
use App\Models\TaskSale;
use App\Models\Timezone;
use App\Models\TaskTicket;
use App\Models\TaskProject;
use App\Models\TaskContact;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\TaskOrganization;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    public function index()
    {

        $tasks = Task::paginate();

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

        $users = User::with('staff')
            ->where('user_role_id', 3)
            ->get()
            ->pluck('task_assigned_to', 'id');

        $timezones = Timezone::pluck('name', 'id');
        $contacts = Contact::pluck('name', 'id');
        $organizations = Organization::pluck('name', 'id');
        $sales = Sale::pluck('name', 'id');
        $tickets = Ticket::pluck('name', 'id');
        $projects = Project::where('tenant_id',  Auth::user()->tenant_id)->pluck('order_number', 'id');
        $html = view('tasks.create', [
            'types' => $types,
            'priorities' => $priorities,
            'users' => $users,
            'completion_statuses' => $completion_statuses,
            'timezones' => $timezones,
            'contacts' => $contacts,
            'organizations' => $organizations,
            'sales' => $sales,
            'projects' => $projects,
            'tickets' => $tickets
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        try {
            $rules = [
                'name' => 'required',
                'type' => 'required',
                'priority' => 'required',
                'assigned_to' => 'required',
                'start_date' => 'required',
                'end_date' => 'required|after_or_equal:start_date',
                'completion_status' => 'required',
                'timezone_id' => 'required',
                'description' => 'nullable',
                'organization_id' => 'required',
                'contact_id' => 'required',
                'sale_id' => 'required',
                'ticket_id' => 'required',
            ];

            $messages = [];

            $attributes = [
                'contact_id' => 'contact',
                'organization_id' => 'organization',
                'sale_id' => 'sale',
                'ticket_id' => 'ticket'
            ];

            $request->validate($rules, $messages, $attributes);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }

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

        if ($request->filled('contact_id')) {
            TaskContact::create([
                'tenant_id' => $tenant_id,
                'task_id' => $task->id,
                'contact_id' => $request->input('contact_id'),
            ]);
        }

        if ($request->filled('organization_id')) {
            TaskOrganization::create([
                'tenant_id' => $tenant_id,
                'task_id' => $task->id,
                'organization_id' => $request->input('organization_id'),
            ]);
        }

        if ($request->filled('sale_id')) {
            TaskSale::create([
                'tenant_id' => $tenant_id,
                'task_id' => $task->id,
                'sale_id' => $request->input('sale_id'),
            ]);
        }

        if ($request->filled('ticket_id')) {
            TaskTicket::create([
                'tenant_id' => $tenant_id,
                'task_id' => $task->id,
                'ticket_id' => $request->input('ticket_id'),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Task has been added successfully!!!',
            'redirect' => url()->previous()
        ]);
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
        $task = Task::with('contact', 'organization', 'sale', 'ticket')->find($decryptedTaskId);

        $projects = Project::where('tenant_id',  Auth::user()->tenant_id)->pluck('order_number', 'id');
        $users = User::with('staff')
            ->where('user_role_id', 3)
            ->get()
            ->pluck('task_assigned_to', 'id');

        $timezones = Timezone::pluck('name', 'id');
        $contacts = Contact::pluck('name', 'id');
        $organizations = Organization::pluck('name', 'id');
        $sales = Sale::pluck('name', 'id');
        $tickets = Ticket::pluck('name', 'id');

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
            'projects' => $projects,
            'tickets' => $tickets
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        try {
            $rules = [
                'name' => 'required',
                'type' => 'required',
                'priority' => 'required',
                'assigned_to' => 'required',
                'start_date' => 'required',
                'end_date' => 'required|after_or_equal:start_date',
                'completion_status' => 'required',
                'timezone_id' => 'required',
                'description' => 'nullable',
                'organization_id' => 'required',
                'contact_id' => 'required',
                'sale_id' => 'required',
                'ticket_id' => 'required',
            ];

            $messages = [];

            $attributes = [
                'contact_id' => 'contact',
                'organization_id' => 'organization',
                'sale_id' => 'sale',
                'ticket_id' => 'ticket'
            ];

            $request->validate($rules, $messages, $attributes);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $decryptedTaskId = Task::decrypted_id($id);
        $task = Task::find($decryptedTaskId);
        $task->tenant_id = $tenant_id;
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

        if ($request->filled('contact_id')) {
            $task->contact()->updateOrCreate(
                ['task_id' => $task->id],
                [
                    'tenant_id' => $tenant_id,
                    'contact_id' => $request->input('contact_id'),
                ]
            );
        }

        if ($request->filled('organization_id')) {
            $task->organization()->updateOrCreate(
                ['task_id' => $task->id],
                [
                    'tenant_id' => $tenant_id,
                    'organization_id' => $request->input('organization_id'),
                ]
            );
        }

        if ($request->filled('sale_id')) {
            $task->sale()->updateOrCreate(
                ['task_id' => $task->id],
                [
                    'tenant_id' => $tenant_id,
                    'sale_id' => $request->input('sale_id'),
                ]
            );
        }

        if ($request->filled('ticket_id')) {
            $task->ticket()->updateOrCreate(
                ['task_id' => $task->id],
                [
                    'tenant_id' => $tenant_id,
                    'ticket_id' => $request->input('ticket_id'),
                ]
            );
        }

        if ($request->filled('project_id')) {
            $task->project()->updateOrCreate(
                ['task_id' => $task->id],
                [
                    'tenant_id' => $tenant_id,
                    'project_id' => $request->input('project_id'),
                ]
            );
        }else{
            $task = TaskProject::where('task_id', $task->id)->first();
            $task->delete();
        }

        // session(['success_message' => 'Task has been updated successfully!!!']);

        // return redirect()->back();
        
        return response()->json([
            'success' => true,
            'message' => 'Task has been updated successfully!!!',
            'redirect' => url()->previous()
        ]);
    }

    public function destroy(string $id)
    {
        $decryptedTaskId = Task::decrypted_id($id);
        $task = Task::find($decryptedTaskId);
        $task->delete();

        if ($task->contact) {
            $task->contact->delete();
        }

        if ($task->organization) {
            $task->organization->delete();
        }

        if ($task->sale) {
            $task->sale->delete();
        }

        if ($task->ticket) {
            $task->ticket->delete();
        }

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
