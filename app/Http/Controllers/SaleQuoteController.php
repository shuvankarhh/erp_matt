<?php

namespace App\Http\Controllers;

use App\Models\SaleQuote;
use Illuminate\Http\Request;

class SaleQuoteController extends Controller
{
    public function index()
    {
        $sale_quotes = SaleQuote::paginate();

        return view('sale_quotes.index', compact('sale_quotes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
