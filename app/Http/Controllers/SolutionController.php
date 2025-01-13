<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class SolutionController extends Controller
{
    public function index()
    {
        $solutions = Solution::with('currency')->paginate();

        return view('solutions.index', [
            'solutions' => $solutions
        ]);
    }

    public function create()
    {
        $types = [
            1 => 'Product',
            2 => 'Service'
        ];

        $intervals = [
            1 => 'One-time',
            2 => 'Weekly',
            3 => 'Monthly',
            4 => 'Quarterly',
            5 => 'Semi-annually',
            6 => 'Annually',
        ];

        $currencies = Currency::pluck('name', 'id');

        $html = view('solutions.create', [
            'types' => $types,
            'currencies' => $currencies,
            'intervals' => $intervals
        ])->render();

        return response()->json([
            'html' => $html,
            'modal_width' => 'max-w-xl',
        ]);
    }

    public function store(Request $request)
    {
        try {
            $rules = [
                'name' => 'required|string|max:255',
                'sku' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'type' => 'required|string',
                // 'solution_url' => 'nullable|url',
                'solution_url' => 'nullable',
                'currency_id' => 'required|integer|exists:crm_currencies,id',
                'price' => 'required|numeric|min:0',
                'cost' => 'required|numeric|min:0|lte:price',
                'tax_percentage' => 'required|numeric|min:0|max:100',
                'subscription_interval' => 'nullable|string',
                'subscription_term' => 'nullable|integer|min:1',
                'image' => 'nullable|image|max:5000',
            ];

            $messages = [
                'price.min' => 'The price must be at least 0.',
                'cost.min' => 'The cost must be at least 0.',
                'tax_percentage.min' => 'Tax percentage cannot be less than 0.',
                'tax_percentage.max' => 'Tax percentage cannot be greater than 100.',
                'currency_id.exists' => 'The selected currency is invalid.',
            ];

            $attributes = [
                'solution_url' => 'solution URL',
                'tax_percentage' => 'tax percentage',
                'currency_id' => 'currency',
            ];

            $data = $request->validate($rules, $messages, $attributes);

            $request->validate($rules, $messages, $attributes);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }

        // Custom validation: Ensure cost does not exceed price
        if (isset($data['price']) && isset($data['cost']) && $data['cost'] > $data['price']) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => [
                    'cost' => ['The cost cannot exceed the price.'],
                ],
            ], 422);
        }

        // $validation_rules = [
        //     'name' => 'required',
        //     'sku' => 'nullable',
        //     'description' => 'nullable',
        //     'type' => 'required',
        //     'solution_url' => 'nullable',
        //     'currency_id' => 'required',
        //     'price' => 'nullable',
        //     'cost' => 'nullable',
        //     'tax_percentage' => 'required',
        //     'subscription_interval' => 'nullable',
        //     'subscription_term' => 'integer',
        //     'image' => 'nullable|image|max:5000'
        // ];

        // Validation::validate($request, $validation_rules, [], []);
        // if (ErrorMessage::has_error()) {
        //     return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->except('image')]);
        // }

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $solution = new Solution();
        $solution->tenant_id = $tenant_id;
        $solution->sku = $request->sku;
        $solution->name = $request->name;
        $solution->description = $request->description;
        $solution->type = $request->type;
        $solution->storage_provider_id = 1;
        $solution->is_private_image = true;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('solution_images', 'public');
            $solution->image_path = $path;
            $solution->image_url = Storage::url($path);
            $solution->original_image_name = $request->file('image')->getClientOriginalName();
        }

        $price = $request->input('price');
        $cost = $request->input('cost');
        $tax_percentage = $request->input('tax_percentage');

        $tax_amount = $price * ($tax_percentage / 100);
        $final_price = $price + $tax_amount;

        $solution->solution_url = $request->solution_url;
        $solution->currency_id = $request->currency_id;
        $solution->price = $price;
        $solution->cost = $cost;
        $solution->tax_percentage = $tax_percentage;
        $solution->tax_amount = $tax_amount;
        $solution->final_price = $final_price;
        $solution->subscription_interval = $request->subscription_interval;
        $solution->subscription_term = $request->subscription_term;
        $solution->save();

        // return redirect('solutions')->with(['success_message' => 'Solution has been added successfully!!!']);

        return response()->json([
            'success' => true,
            'message' => 'Solution has been added successfully!!!',
            'redirect' => route('solutions.index')
        ]);
    }

    public function edit($id)
    {
        $types = [
            1 => 'Product',
            2 => 'Service'
        ];

        $intervals = [
            1 => 'One-time',
            2 => 'Weekly',
            3 => 'Monthly',
            4 => 'Quarterly',
            5 => 'Semi-annually',
            6 => 'Annually',
        ];


        $decryptedSolutionId = Solution::decrypted_id($id);
        $solution = Solution::with('currency')->find($decryptedSolutionId);
        $currencies = Currency::pluck('name', 'id');

        $html = view('solutions.edit', [
            'solution' => $solution,
            'types' => $types,
            'currencies' => $currencies,
            'intervals' => $intervals
        ])->render();

        return response()->json([
            'html' => $html,
            'modal_width' => 'max-w-xl',
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($id, $request->all());

        $validation_rules = [
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:1000',
            'type' => 'required|integer',
            'solution_url' => 'nullable|url',
            'currency_id' => 'required|integer',
            'price' => 'nullable|numeric|min:0',
            'cost' => 'nullable|numeric|min:0',
            'tax_percentage' => 'nullable|numeric|min:0|max:100',
            'subscription_interval' => 'nullable|integer|min:1',
            'subscription_term' => 'nullable|integer|min:1',
            'image' => 'nullable|image|max:5000',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->except('image')]);
        }

        // dd('Validation Pass');

        $decryptedSolutionId = Solution::decrypted_id($id);
        $solution = Solution::find($decryptedSolutionId);
        $solution->name = $request->name;
        $solution->description = $request->description;
        $solution->sku = $request->sku;
        $solution->type = $request->type;
        $solution->is_private_image = true;

        if ($request->hasFile('image')) {
            if (Storage::disk('public')->exists($solution->image_path)) {
                Storage::disk('public')->delete($solution->image_path);
            }

            $path = $request->file('image')->store('solution_images', 'public');
            $solution->image_path = $path;
            $solution->image_url = Storage::url($path);
            $solution->original_image_name = $request->file('image')->getClientOriginalName();
        }

        $solution->solution_url = $request->solution_url;
        $solution->currency_id = $request->currency_id;
        $solution->price = $request->price;
        $solution->cost = $request->cost;
        $solution->tax_percentage = $request->tax_percentage;
        $solution->subscription_interval = $request->subscription_interval;
        $solution->subscription_term = $request->subscription_term;
        $solution->save();

        return redirect()->back()->with(['success_message' => 'Solution has been update successfully!!!']);
    }

    public function destroy(string $id)
    {
        $id = Solution::decrypted_id($id);
        Solution::find($id)->delete();

        session(['success_message' => 'Solution has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }

    public function show(string $id)
    {

        $id = Solution::decrypted_id($id);
        $solution = Solution::with('currency', 'storageProvider')->where("id", $id)->first();

        return view('solutions.show', [
            'solution' => $solution,
        ]);
    }

    public function searchSolution(Request $request)
    {
        $input = $request->input('term');

        if ($input != null) {
            $results = [];

            $queries = Solution::where('name', 'LIKE', '%' . $input . '%')
                ->limit(5)
                ->select('id', 'name')
                ->get();

            foreach ($queries as $query) {
                $results[] = ['id' => $query->id, 'value' => $query->name];
            }

            return response()->json($results);
        }
    }
}
