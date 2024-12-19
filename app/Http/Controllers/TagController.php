<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        $html = view('tags.create-modal')->render();

        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $tag = new Tag();
        $tag->tenant_id = $tenant_id;
        $tag->name = $request->name;
        $tag->type = $request->type;
        $tag->save();

        session()->flash('success_message', 'Tag has been added successfully!!!');

        return redirect()->back();
    }


    public function edit($id)
    {
        $decryptedTagId = Tag::decrypted_id($id);
        $tag = Tag::find($decryptedTagId);

        $html = view('tags.edit-modal', [
            'tag' => $tag,
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $decryptedTagId = Tag::decrypted_id($id);
        $tag = Tag::find($decryptedTagId);
        $tag->tenant_id = $tenant_id;
        $tag->name = $request->name;
        $tag->type = $request->type;
        $tag->save();

        session()->flash('success_message', 'Tag has been updated successfully!!!');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $decryptedTagId = Tag::decrypted_id($id);
        Tag::find($decryptedTagId)->delete();
        return response()->json(array('response_type' => 1));
    }
}
