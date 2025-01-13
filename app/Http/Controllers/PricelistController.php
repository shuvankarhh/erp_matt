<?php

namespace App\Http\Controllers;

use App\Models\Pricelist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;

class PricelistController extends Controller
{
    public function index()
    {
        abort(404);
    }

    public function create()
    {
        $html = view('price_lists.create')->render();

        return response()->json([
            'html' => $html
        ]);
    }

    public function store(Request $request)
    {
        try {
            $rules = [
                'from_price' => ['required', 'numeric', 'min:0'],
                'to_price' => ['required', 'numeric', 'min:0', 'gte:from_price'],
            ];

            $messages = [];

            $attributes = [];

            $request->validate($rules, $messages, $attributes);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $price_list = new Pricelist();
        $price_list->tenant_id = $tenant_id;
        $price_list->from_price = $request->input('from_price');
        $price_list->to_price = $request->input('to_price');
        $price_list->save();

        return response()->json([
            'success' => true,
            'message' => 'Price list has been added successfully!!!',
            'redirect' => url()->previous()
        ]);
    }

    public function show(Pricelist $Pricelist)
    {
        abort(404);
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $price_list = Pricelist::findOrFail($id);

        $html = view('price_lists.edit', compact('price_list'))->render();

        return response()->json([
            'html' => $html,
        ]);
    }

    public function update(Request $request, string $id)
    {
        try {
            $rules = [
                'from_price' => ['required', 'numeric', 'min:0'],
                'to_price' => ['required', 'numeric', 'min:0', 'gte:from_price'],
            ];

            $messages = [];

            $attributes = [];

            $request->validate($rules, $messages, $attributes);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $id = Crypt::decrypt($id);
        $price_list = Pricelist::findOrFail($id);
        $price_list->tenant_id = $tenant_id;
        $price_list->from_price = $request->input('from_price');
        $price_list->to_price = $request->input('to_price');
        $price_list->save();

        return response()->json([
            'success' => true,
            'message' => 'Price list has been updated successfully!!!',
            'redirect' => url()->previous()
        ]);
    }

    public function destroy(string $id)
    {
        $id = Crypt::decrypt($id);
        $price_list = Pricelist::findOrFail($id);

        if ($price_list) {
            $price_list->delete();
        }

        session(['success_message' => 'Price list has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }
}
