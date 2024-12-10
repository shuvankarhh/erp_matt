<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Organization;
use App\Models\ContactSource;
use App\Models\Tag;

class EmailController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $organizations = Organization::all();
        $sources = ContactSource::all();
        return view('email.email_filter',[
            'organizations'=> $organizations,
            'sources' => $sources,
            'tags' => $tags
        ]);
    }


}
