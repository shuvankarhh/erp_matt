<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use Illuminate\Support\Facades\Auth;

class EmailTemplateController extends Controller
{
    public function index()
    {
        $email_templates = EmailTemplate::paginate();

        return view('email_templates.index', compact('email_templates'));
    }

    public function show($id)
    {
        $decryptedEmailTemplateId = EmailTemplate::decrypted_id($id);
        $email_template = EmailTemplate::find($decryptedEmailTemplateId);

        return view('email_templates.view', compact('email_template'));
    }

    public function edit($id)
    {
        $decryptedEmailTemplateId = EmailTemplate::decrypted_id($id);
        $email_template = EmailTemplate::find($decryptedEmailTemplateId);

        $html = view('email_templates.edit', [
            'email_template' => $email_template
        ])->render();

        return response()->json([
            'html' => $html,
            'modal_width' => 'max-w-2xl',
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            ['subject' => 'required|string',],
            ['subject.required' => 'Email subject is required',],
        );

        $decryptedEmailTemplateId = EmailTemplate::decrypted_id($id);
        $email_template = EmailTemplate::find($decryptedEmailTemplateId);

        if (!$email_template) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $email_template->tenant_id = $tenant_id;
        $email_template->name = $request->name;
        $email_template->subject = $request->subject;
        $email_template->body = $request->body;
        $email_template->status = true;
        $email_template->save();

        // return redirect()->route('email-templates.index')->with('success', 'Email template has been updated successfully!!!');

        session(['success_message' => 'Email template has been updated successfully!!!']);

        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $decryptedEmailTemplateId = EmailTemplate::decrypted_id($id);
        $email_template = EmailTemplate::find($decryptedEmailTemplateId);
        $email_template->delete();

        session(['success_message' => 'Email template has been deleted successfully!!!']);

        return response()->json(['response_type' => 1]);
    }
}
