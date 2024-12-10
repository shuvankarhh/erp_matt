<?php

namespace App\Http\Controllers;

class UserImageController extends Controller
{
    public function user_images($file_name)
    {
        return response()->file('../storage/app/images/users/' . $file_name);
    }
}
