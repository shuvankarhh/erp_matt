<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        $response_body =  view('tags._create_modal', []);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required'],
            'type' =>['required'],
        ];

        Validation::validate($request, $rules, [], []);

        if (ErrorMessage::has_error()) {
            return redirect()->back()->with(['error_message' => 'Opps...']);
        }
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->type = $request->type;
        $tag->save();

        session(['success_message' => 'Tag has been created successfully']);

        return redirect()->back();
    }

    public function edit($id)
    {
        $decryptedTagId = Tag::decrypted_id($id);
        $tag = Tag::find($decryptedTagId);
        $response_body =  view('tags._edit_modal', [
            'tag' => $tag,
        ]);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => ['required'],
            'type' =>['required'],
        ];

        Validation::validate($request, $rules, [], []);

        if (ErrorMessage::has_error()) {
            return redirect()->back()->with(['error_message' => 'Opps...']);
        }

        $decryptedTagId = Tag::decrypted_id($id);
        $tag = Tag::find($decryptedTagId);
        $tag->name = $request->name;
        $tag->type = $request->type;
        $tag->save();

        session(['success_message' => 'Tag has been created successfully']);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $decryptedTagId = Tag::decrypted_id($id);
        Tag::find($decryptedTagId)->delete();
        return response()->json(array('response_type' => 1));
    }

    public function invoice(){
        return view('tags.invoice');
    }
}
