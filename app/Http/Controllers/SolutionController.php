<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Solution;
use Illuminate\Http\Request;
use App\Models\StorageProvider;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Services\Vendor\Tauhid\Pagination\Pagination;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\StorageHandlers\DynamicStorageHandler;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class SolutionController extends Controller
{
    public function index()
    {
        $solutions = Solution::with('currency')->get();

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
        // dd($request->all());

        $validation_rules = [
            'name' => 'required',
            'type' => 'required',
            'image' => 'nullable|image|max:5000', // 5MB
            'currency_id' => 'required',
            'subscription_term' => 'integer',
            'tax_percentage' => 'required'
        ];

        Validation::validate($request, $validation_rules, [], []);
        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->except('image')]);
        }

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $solution = new Solution();
        $solution->tenant_id = $tenant_id;
        $solution->name = $request->name;
        $solution->description = $request->description;
        $solution->sku = $request->sku;
        $solution->type = $request->type;
        if ($request->image != null) {
            $dynamic = new DynamicStorageHandler;

            $upload_info = $dynamic->upload($request->file('image'), 'solution_images', true);

            $solution->storage_provider_id = $upload_info['storage_provider_id'];
            $solution->image_path = $upload_info['uploaded_path'];
            $solution->original_image_name = $request->file('image')->getClientOriginalName();
        }
        $solution->is_private_image = false;
        $solution->solution_url = $request->solution_url;
        $solution->currency_id = $request->currency_id;
        $solution->price = $request->price;
        $solution->cost = $request->cost;
        $solution->tax_percentage = $request->tax_percentage;
        $solution->subscription_interval = $request->subscription_interval;
        $solution->subscription_term = $request->subscription_term;
        $solution->save();

        $solution->image_url = route('solution_images', ['id' => $solution->encrypted_id()]);
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
        $validation_rules = [
            'name' => 'required',
            'type' => 'required',
            'image' => 'nullable|image|max:5000', // 5MB
            'currency_id' => 'required',
            'subscription_term' => 'integer'
        ];

        Validation::validate($request, $validation_rules, [], []);
        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->except('image')]);
        }

        $decryptedSolutionId = Solution::decrypted_id($id);
        $solution = Solution::find($decryptedSolutionId);
        $solution->name = $request->name;
        $solution->description = $request->description;
        $solution->sku = $request->sku;
        $solution->type = $request->type;
        if ($request->image != null) {
            $dynamic = new DynamicStorageHandler;

            $dynamic->delete($solution->image_path);

            $upload_info = $dynamic->upload($request->file('image'), 'solution_images', true);

            $solution->storage_provider_id = $upload_info['storage_provider_id'];
            $solution->image_path = $upload_info['uploaded_path'];
            $solution->original_image_name = $request->file('image')->getClientOriginalName();
        }
        $solution->is_private_image = false;
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
