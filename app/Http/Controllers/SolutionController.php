<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $validation_rules = [
            'name' => 'required',
            'sku' => 'nullable',
            'description' => 'nullable',
            'type' => 'required',
            'solution_url' => 'nullable',
            'currency_id' => 'required',
            'price' => 'nullable',
            'cost' => 'nullable',
            'tax_percentage' => 'required',
            'subscription_interval' => 'nullable',
            'subscription_term' => 'integer',
            'image' => 'nullable|image|max:5000'
        ];

        Validation::validate($request, $validation_rules, [], []);
        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->except('image')]);
        }

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

        $solution->solution_url = $request->solution_url;
        $solution->currency_id = $request->currency_id;
        $solution->price = $request->price;
        $solution->cost = $request->cost;
        $solution->tax_percentage = $request->tax_percentage;
        $solution->subscription_interval = $request->subscription_interval;
        $solution->subscription_term = $request->subscription_term;
        $solution->save();

        return redirect('solutions')->with(['success_message' => 'Solution has been added successfully!!!']);
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
