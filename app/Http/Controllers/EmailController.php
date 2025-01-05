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
        $filters = $request->only(['stage', 'engagement', 'lead_status', 'source_id', 'organization_id']);

        $contacts = Contact::filter($filters)->get();

        return response()->json($contacts);
    }

    public function sendEmail(Request $request)
    {
        $contactId = $request->contact_id;
        $contact = Contact::find($contactId);

        Mail::to($contact->email)->send(new TestMail());

        return response()->json(['message' => 'Email sent successfully!!!']);
    }

    // public function index(Request $request)
    // {
    //     $contacts = Contact::query();
    //     // $contacts = Contact::query()
    //     // ->stage($request->input('stage'))
    //     // ->tags($request->input('tags'))
    //     // ->engagement($request->input('engagement'))
    //     // ->leadStatus($request->input('lead_status'))
    //     // ->source($request->input('source_id'))
    //     // ->organization($request->input('organization_id'))
    //     // ->get();

    //     // dd($contacts);

    //     // dd($_SERVER['REQUEST_METHOD'], $_REQUEST, $request->all());

    //     // $contacts = Contact::query();
    //     // dd($request->ajax(), $request->isMethod('GET'), $request->ajax() && $request->isMethod('GET'));

    //     // if ($request->ajax() && $request->isMethod('GET')) {
    //     if ($_SERVER['REQUEST_METHOD'] === "POST") {
    //         // dd('aci');
    //         // dd('please bro', $request->all());
    //         // dd($request->get('stage'));
    //         // dd($request->input('stage'));
    //         // $filters = $request->only(['stage', 'tags', 'engagement', 'lead_status', 'source_id', 'organization_id']);


    //         if ($request->input('stage') !== null) {
    //             $contacts->where('stage', $request->input('stage'));
    //         }

    //         // if (isset($filters['tags'])) {
    //         //     $contacts->whereHas('tags', function ($query) use ($filters) {
    //         //         $query->where('tag_id', $filters['tags']);
    //         //     });
    //         // }

    //         // if (isset($filters['engagement'])) {
    //         //     $contacts->where('engagement', $filters['engagement']);
    //         // }

    //         // if (isset($filters['lead_status'])) {
    //         //     $contacts->where('lead_status', $filters['lead_status']);
    //         // }

    //         // if (isset($filters['source_id'])) {
    //         //     $contacts->where('source_id', $filters['source_id']);
    //         // }

    //         // if (isset($filters['organization_id'])) {
    //         //     $contacts->where('organization_id', $filters['organization_id']);
    //         // }

    //         // $filters = $request->only(['stage', 'tags', 'engagement', 'lead_status', 'source_id', 'organization_id']);
    //         // foreach ($filters as $key => $value) {
    //         //     if (!empty($value)) {
    //         //         if ($key === 'tags') {
    //         //             $contacts->whereHas('tags', function ($query) use ($value) {
    //         //                 $query->where('tag_id', $value);
    //         //             });
    //         //         } else {
    //         //             $contacts->where($key, $value);
    //         //         }
    //         //     }
    //         // }

    //         return response()->json([
    //             'success' => true,
    //         ]);
    //     }

    //     // dd('val', $contacts->get());

    //     $stages = [
    //         1 => 'Subscriber',
    //         2 => 'Lead',
    //         3 => 'Opportunity',
    //         4 => 'Customer',
    //         5 => 'Evangelist',
    //         6 => 'Other'
    //     ];

    //     $engagements = [
    //         1 => 'Hot',
    //         2 => 'Warm',
    //         3 => 'Cold'
    //     ];

    //     $leads = [
    //         1 => 'New',
    //         2 => 'Contacted',
    //         3 => 'In Progress',
    //         4 => 'Qualified',
    //         5 => 'Unqualified',
    //         6 => 'Attempted To Contact'
    //     ];

    //     $tags = Tag::where('type', 1)->pluck('name', 'id');
    //     $sources = ContactSource::pluck('name', 'id');
    //     $organizations = Organization::pluck('name', 'id');

    //     return view('emails.index', [
    //         'stages' => $stages,
    //         'tags' => $tags,
    //         'engagements' => $engagements,
    //         'leads' => $leads,
    //         'sources' => $sources,
    //         'organizations' => $organizations,
    //         'contacts' => $contacts
    //     ]);
    // }

    // public function index(Request $request)
    // {
    //     $contacts = collect();

    //     if ($_SERVER['REQUEST_METHOD'] === "GET") {

    //         $filters = $request->only(['stage', 'tags', 'engagement', 'lead_status', 'source_id', 'organization_id']);

    //         $contacts = Contact::query();

    //         if (isset($filters['stage'])) {
    //             $contacts->where('stage', $filters['stage']);
    //         }

    //         if (isset($filters['tags'])) {
    //             $contacts->whereHas('tags', function ($query) use ($filters) {
    //                 $query->where('tag_id', $filters['tags']);
    //             });
    //         }

    //         if (isset($filters['engagement'])) {
    //             $contacts->where('engagement', $filters['engagement']);
    //         }

    //         if (isset($filters['lead_status'])) {
    //             $contacts->where('lead_status', $filters['lead_status']);
    //         }

    //         if (isset($filters['source_id'])) {
    //             $contacts->where('source_id', $filters['source_id']);
    //         }

    //         if (isset($filters['organization_id'])) {
    //             $contacts->where('organization_id', $filters['organization_id']);
    //         }

    //         $contacts = $contacts->get();

    //         return response()->json($contacts);
    //     }

    //     $stages = [
    //         1 => 'Subscriber',
    //         2 => 'Lead',
    //         3 => 'Opportunity',
    //         4 => 'Customer',
    //         5 => 'Evangelist',
    //         6 => 'Other'
    //     ];

    //     $engagements = [
    //         1 => 'Hot',
    //         2 => 'Warm',
    //         3 => 'Cold'
    //     ];

    //     $leads = [
    //         1 => 'New',
    //         2 => 'Contacted',
    //         3 => 'In Progress',
    //         4 => 'Qualified',
    //         5 => 'Unqualified',
    //         6 => 'Attempted To Contact'
    //     ];

    //     $tags = Tag::where('type', 1)->pluck('name', 'id');
    //     $sources = ContactSource::pluck('name', 'id');
    //     $organizations = Organization::pluck('name', 'id');

    //     return view('emails.index', [
    //         'stages' => $stages,
    //         'tags' => $tags,
    //         'engagements' => $engagements,
    //         'leads' => $leads,
    //         'sources' => $sources,
    //         'organizations' => $organizations,
    //         'contacts' => $contacts,
    //     ]);
    // }
}
