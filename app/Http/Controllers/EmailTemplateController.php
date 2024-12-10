<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use Illuminate\Validation\Rule;
use App\Services\Vendor\Tauhid\Pagination\Pagination;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emailTemplates = EmailTemplate::paginate();
        $pagination = Pagination::default($emailTemplates);
        return view('email_template.index', compact('emailTemplates', 'pagination'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('email_template.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validationRules = [
            'name' => 'required|unique:crm_email_templates,name',
            'template' => 'required'
        ];

        Validation::validate($request, $validationRules, [], []);

        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->all()]);
        }

        try {
            $emailTemplate = new EmailTemplate();
            $emailTemplate->name = $request->name;
            $emailTemplate->template = $request->template;
            $emailTemplate->save();

            return redirect(route('email-template.index'))->with(['success_message' => 'Email Template Created successfully']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error_message', $e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $decryptedId = EmailTemplate::decrypted_id($id);
        $template = EmailTemplate::find($decryptedId);

        return view('email_template.show', compact('template'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = EmailTemplate::decrypted_id($id);
        $emailTemplate = EmailTemplate::find($id);
        
        return view('email_template.edit', compact('emailTemplate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = EmailTemplate::decrypted_id($id);
        $emailTemplate = EmailTemplate::find($id);
        $validationRules = [
            'name' => [
                Rule::unique('crm_email_templates', 'name')->ignore($emailTemplate->id),
            ],
            
            'template' => 'required'
        ];

        Validation::validate($request, $validationRules, [], []);

        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->all()]);
        }

        try {
            

            $emailTemplate->name = $request->name;
            $emailTemplate->template = $request->template;
            $emailTemplate->save();

            return redirect(route('email-template.index'))->with(['success_message' => 'Email Template edited successfully']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error_message', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = EmailTemplate::decrypted_id($id);
        $temp=EmailTemplate::find($id);
        $temp->delete();
        session(['success_message' => 'Ticket Source has been deleted successfully']);
        return response()->json(array('response_type' => 1));
    }
}
