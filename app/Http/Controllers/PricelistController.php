<?php

namespace App\Http\Controllers;

use App\Models\Pricelist;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
                'price' => [
                    'required',
                    'numeric',
                    'min:0',
                    'regex:/^\d{1,10}(\.\d{1,2})?$/',
                    // 'regex:/^\d+(\.\d{1,2})?$/',
                    Rule::unique('pricelists', 'price')
                ],
            ];

            $messages = [
                'price.regex' => 'Price must be up to 10 digits with up to 2 decimals.',
                'price.unique' => 'This price already exists.',
            ];

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
        $price_list->price = $request->input('price');
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
        $id = Crypt::decrypt($id);
        $price_list = Pricelist::findOrFail($id);

        try {
            $request->validate([
                'price' => [
                    'required',
                    'numeric',
                    'min:0',
                    'regex:/^\d{1,10}(\.\d{1,2})?$/',
                    Rule::unique('pricelists', 'price')->ignore($price_list->id ?? null),
                ],
            ], [
                'price.regex' => 'Price must be up to 10 digits with up to 2 decimals.',
                'price.unique' => 'This price already exists.',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $price_list->tenant_id = $tenant_id;
        $price_list->price = $request->input('price');
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
