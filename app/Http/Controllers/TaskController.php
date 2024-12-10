<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\TaskTicket;
use App\Models\TaskSale;
use Illuminate\Support\Facades\DB;
use App\Models\TicketSource;
use App\Models\Contact;
use App\Models\Timezone;
use App\Models\TaskContact;
use App\Models\TaskOrganization;
use App\Models\Organization;
use App\Models\SupportPipeline;
use App\Models\SupportPipelineStage;
use App\Models\User;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Services\Vendor\Tauhid\Pagination\Pagination;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::paginate();
        $pagination = Pagination::default($tasks);
        return view('tasks.task_index',[
            'tasks' => $tasks,
            'pagination' => $pagination,
        ]);
    }

    public function create()
    {
        $users = User::with('staff')->where('user_role_id',3)->get();
        $organizations = Organization::all();
        $timezones = Timezone::all();
        $response_body =  view('tasks._task_create_modal', [
            'organizations' => $organizations,
            'users' => $users,
            'timezones' => $timezones,
        ]);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }


    public function store(Request $request)
    {
        $validation_rules = [
            'name' => 'required',
            'type' => 'required',
            'priority' => 'required',
            'assigned_to' => 'required',
            'completion_status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'tickets_id' => 'required',
            'sales_id' => 'required',
            'tickets_id' => 'required',
        ];
        Validation::validate($request, $validation_rules, [], []);
        if(ErrorMessage::has_error())
        {
            $response_body_html =  view('vendor._errors', [
                'errors' => ErrorMessage::$errors,
            ]);
            return response()->json(array('response_type'=> 0,'_old_input' => $request->all(), 'response_body_html'=> mb_convert_encoding($response_body_html, 'UTF-8', 'ISO-8859-1')));
        }
        $task = new Task;
        $task->name = $request->name;
        $task->type = $request->type;
        $task->priority = $request->priority;
        $task->assigned_to = $request->assigned_to;
        $task->completion_status = $request->completion_status;
        $task->start_date = $request->start_date;
        $task->due_date = $request->end_date;
        $task->user_timezone_id = $request->user_timezone_id;
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

        $saleId = $request->sales_id;
        if ($organizationId) {
            foreach ($saleId as $id) {
                $ticket_sale = new TaskSale();
                $ticket_sale->task_id = $task->id;
                $ticket_sale->sale_id = $id;
                $ticket_sale->save();
            }
        }

        $saleId = $request->tickets_id;
        if ($organizationId) {
            foreach ($saleId as $id) {

                $ticket_sale = new TaskTicket();
                $ticket_sale->task_id = $task->id;
                $ticket_sale->ticket_id = $id;
                $ticket_sale->save();

            }
        }

        session(['success_message' => 'Ticket has been created successfully']);
        return response()->json(array('response_type'=> 1 ,'success_message' => 'Ticket has been created successfully'));

    }

    public function edit($id)
    {
        $id = Task::decrypted_id($id);
        $task = Task::find($id);
        $users = User::with('staff')->where('user_role_id',3)->get();
        $organizations = Organization::all();
        $timezones = Timezone::all();

        $organizations = TaskOrganization::with('organization')->where('task_id',$id)->get();
        $contactIds = TaskContact::with('contact')->where('task_id',$id)->get();
        $saleIds = TaskSale::with('sale')->where('task_id',$id)->get();        
        $ticketIds = TaskTicket::with('ticket')->where('task_id',$id)->get();

        $response_body =  view('tasks._task_edit_modal', [
            'organizations' => $organizations,
            'users' => $users,
            'timezones' => $timezones,
            'task'=> $task,
            'contactIds' => $contactIds,
            'organizationIds' =>$organizations,
            'saleIds' =>$saleIds,
            'ticketIds' =>$ticketIds
        ]);

        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function show($id)
    {
        $id = Task::decrypted_id($id);
        $task = Task::with('user')->find($id);
        $organization = TaskOrganization::with('organization')->where('task_id',$id)->first();
        $contactIds = TaskContact::with('contact')->where('task_id',$id)->get();
        $saleIds = TaskSale::with('sale')->where('task_id',$id)->first();        
        $ticketIds = TaskTicket::with('ticket')->where('task_id',$id)->first();

        $response_body =  view('tasks._task_show_modal', [
            'task' => $task,
            'contactIds' => $contactIds,
            'organization' => $organization,
            'saleIds' => $saleIds,
            'ticketIds' => $ticketIds,
        ]);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function update(Request $request, $id)
    {
        $validation_rules = [
            'name' => 'required',
            'type' => 'required',
            'priority' => 'required',
            'assigned_to' => 'required',
            'completion_status' => 'required',
            'start_date' => 'required',
            'due_date' => 'required',
            'tickets_id' => 'required',
            'sales_id' => 'required',
            'tickets_id' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);
        if(ErrorMessage::has_error())
        {
            $response_body_html =  view('vendor._errors', [
                'errors' => ErrorMessage::$errors,
            ]);
            return response()->json(array('response_type'=> 0,'_old_input' => $request->all(), 'response_body_html'=> mb_convert_encoding($response_body_html, 'UTF-8', 'ISO-8859-1')));
        }


        $id = Task::decrypted_id($id);
        $task = Task::find($id);
        $task->name = $request->name;
        $task->type = $request->type;
        $task->priority = $request->priority;
        $task->assigned_to = $request->assigned_to;
        $task->completion_status = $request->completion_status;
        $task->start_date = $request->start_date;
        $task->due_date = $request->due_date;
        $task->user_timezone_id = $request->user_timezone_id;
        $task->description = $request->description;
        $task->save();

        $contactIds = $request->contact_id;
        if ($contactIds) {
            foreach ($contactIds as $con_id) {
                $ticket_contact = TaskContact::where('task_id',$task->id)->where('contact_id',$con_id)->first();
                if(isset($ticket_contact)){
                }else{
                    $ticket_contact = new TaskContact();
                    $ticket_contact->task_id = $task->id;
                    $ticket_contact->contact_id =$con_id;
                    $ticket_contact->save();
                }
            }
        }

        $ticketContactIds = TaskContact::where('task_id',$task->id)->pluck('contact_id');
        if ($ticketContactIds) {
            $missingContacts = $ticketContactIds->diff($contactIds)->all();
            foreach($missingContacts as $missingContact)
            {
                TaskContact::where('task_id',$task->id)->where('contact_id',$missingContact)->delete();
            }
        } 


        $organizationId = $request->organization_id;
        if ($organizationId) {
            foreach ($organizationId as $id) {
                $ticket_organization = TaskOrganization::where('task_id',$task->id)->where('organization_id',$id)->first();
                if(isset($ticket_organization)){
            
                }else{
                    $ticket_organization = new TaskOrganization();
                    $ticket_organization->task_id = $task->id;
                    $ticket_organization->organization_id = $id;
                    $ticket_organization->save();
                }
            }
        }

        $ticketOrganizationIds = TaskOrganization::where('task_id',$task->id)->pluck('organization_id');
        if ($ticketOrganizationIds) {
            $missingOrganizations = $ticketOrganizationIds->diff($organizationId)->all();
            foreach($missingOrganizations as $missingOrganization)
            {
                TaskOrganization::where('task_id',$task->id)->where('organization_id',$missingOrganization)->delete();
            }
        } 


        $saleId = $request->sales_id;
        if ($saleId) {
            foreach ($saleId as $id) {
                $ticket_sale = TaskSale::where('task_id',$task->id)->where('sale_id',$id)->first();
                if(isset($ticket_sale)){
                }else{
                    $ticket_sale = new TaskSale();
                    $ticket_sale->task_id = $task->id;
                    $ticket_sale->sale_id = $id;
                    $ticket_sale->save();
                }
            }
        }
        $saleIds = TaskSale::where('task_id',$id)->pluck('sale_id');
        if ($saleIds) {
            $missingSales = $saleIds->diff($saleId)->all();
            foreach($missingSales as $missingSale)
            {
                TaskSale::where('task_id',$id)->where('sale_id',$missingSale)->delete();
            }
        } 
        session(['success_message' => 'Task has been updated successfully']);
        return response()->json(array('response_type'=> 1));
    }

    public function destroy(string $id)
    {
        $id = Task::decrypted_id($id);
        Task::find($id)->delete();
        session(['delete_success_message' => 'Task has been deleted successfully']);
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
