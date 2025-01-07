<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Tag;
use App\Models\Contact;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\ContactSource;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        $stages = [
            1 => 'Subscriber',
            2 => 'Lead',
            3 => 'Opportunity',
            4 => 'Customer',
            5 => 'Evangelist',
            6 => 'Other'
        ];

        $engagements = [
            1 => 'Hot',
            2 => 'Warm',
            3 => 'Cold'
        ];

        $leads = [
            1 => 'New',
            2 => 'Contacted',
            3 => 'In Progress',
            4 => 'Qualified',
            5 => 'Unqualified',
            6 => 'Attempted To Contact'
        ];

        $tags = Tag::where('type', 1)->pluck('name', 'id');
        $sources = ContactSource::pluck('name', 'id');
        $organizations = Organization::pluck('name', 'id');
        $contacts = Contact::paginate();

        return view('emails.index', [
            'stages' => $stages,
            'tags' => $tags,
            'engagements' => $engagements,
            'leads' => $leads,
            'sources' => $sources,
            'organizations' => $organizations,
            'contacts' => $contacts
        ]);
    }

    public function fetchContacts(Request $request)
    {
        $filters = $request->only(['stage', 'tags', 'engagement', 'lead_status', 'source_id', 'organization_id']);

        $contacts = Contact::filter($filters)->get();

        return response()->json($contacts);
    }

    public function sendEmail(Request $request)
    {
        $contactId = $request->contact_id;
        $contact = Contact::find($contactId);

        Mail::to($contact->email)->send(new TestMail());

        return response()->json(['message' => 'Email has been sent successfully!!!']);
    }
}
