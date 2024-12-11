<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UiController extends Controller
{
    public function showMingcute()
    {
        return view('icons.mingcute');
    }

    public function showFeather()
    {
        return view('icons.feather');
    }

    public function showMaterialSymbols()
    {
        return view('icons.material-symbols');
    }
}
