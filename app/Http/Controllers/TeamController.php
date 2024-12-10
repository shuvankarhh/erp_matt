<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Services\Vendor\Tauhid\Pagination\Pagination;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

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
        $response_body =  view('teams._create_modal');
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function store(Request $request)
    {
        $validation_rules = [
            'name' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return redirect()->back()->with(['error_message' => 'The name is required.']);
        }

        $team = new Team();
        $team->name = $request->get('name');
        $team->save();

        session(['success_message' => 'Team has been created successfully']);

        return redirect()->back();
    }

    public function show(Team $team)
    {
        abort(404);
    }

    public function edit($id)
    {
        $decryptedTeamId = Team::decrypted_id($id);
        $team = Team::find($decryptedTeamId);
        $response_body =  view('teams._edit_modal', [
            'team' => $team,
        ]);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function update(Request $request, $id)
    {
        $validation_rules = [
            'name' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return redirect()->back()->with(['error_message' => 'The name is required.']);
        }

        $decryptedTeamId = Team::decrypted_id($id);
        $team = Team::find($decryptedTeamId);
        $team->name = $request->get('name');
        $team->save();

        session(['success_message' => 'Team has been updated successfully']);

        return redirect()->back();
    }

    public function destroy( $id)
    {
        $decryptedTeamId = Team::decrypted_id($id);
        Team::find($decryptedTeamId)->delete();
        return response()->json(array('response_type' => 1));
    }
}
