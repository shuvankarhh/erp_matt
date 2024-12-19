<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Vendor\Tauhid\Pagination\Pagination;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::paginate();
        $pagination = Pagination::default($teams);
        return view('teams.index', compact('teams', 'pagination'));
    }

    public function create()
    {
        $html = view('teams.create')->render();

        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $team = new Team();
        $team->tenant_id = $tenant_id;
        $team->name = $request->get('name');
        $team->save();

        session(['success_message' => 'Team has been added successfully!!!']);

        return redirect()->back();
    }

    public function edit($id)
    {
        $decryptedTeamId = Team::decrypted_id($id);
        $team = Team::find($decryptedTeamId);

        $html = view('teams.edit', [
            'team' => $team,
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $decryptedTeamId = Team::decrypted_id($id);
        $team = Team::find($decryptedTeamId);
        $team->name = $request->get('name');
        $team->save();

        session(['success_message' => 'Team has been updated successfully!!!']);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $decryptedTeamId = Team::decrypted_id($id);
        Team::find($decryptedTeamId)->delete();

        session(['success_message' => 'Team has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }
}
