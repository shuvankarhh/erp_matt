<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use App\Services\StorageHandlers\DynamicStorageHandler;

class SolutionImageController extends Controller
{
    public function show($id)
    {
        $id = Solution::decrypted_id($id);
        $solution = Solution::with('storage_provider')->find($id);

        $dynamic = new DynamicStorageHandler;

        // It is not a realistic logic; it is just an example logic
        if (auth()->user()->user_role_id == 1 && $solution->is_private_image == 0) {
            return $dynamic->show($solution->image_path, $solution->storage_provider->alias);
        } else {
            abort(403);
        }
    }
}
