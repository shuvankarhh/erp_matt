<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Services\Vendor\Tauhid\Pagination\Pagination;
use App\Services\BuiltInWebsiteSettings;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('*')
        ->with('user_role')
        ->with('user_photos')
        ->where('id', '!=', 1)
        ->orderBy('name')
        ->paginate();

        $pagination = Pagination::default($users);

        return view('users', [
            'users' => $users->items(),
            'pagination' => $pagination,
        ]);
    }

    public function destroy(string $id)
    {
        $id = User::decrypted_id($id);
        DB::transaction(function () use ($id) {

            User::find($id)->delete();
            $x=Staff::where('user_id',$id)->first();
            $x->delete();

        });
        return response()->json(array('response_type'=> 1));
    }
}
