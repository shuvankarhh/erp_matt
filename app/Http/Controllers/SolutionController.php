<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;
use App\Models\Solution;
use Illuminate\Validation\Rule;
use App\Models\StorageProvider;
use App\Services\Vendor\Tauhid\Pagination\Pagination;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Services\StorageHandlers\DynamicStorageHandler;

class SolutionController extends Controller
{
    public function index()
    {
        $solutions = Solution::paginate();
        $pagination = Pagination::default($solutions);
        return view('solution.solution_index', [
            'solutions' => $solutions,
            'pagination' => $pagination
        ]);
    }

    public function create()
    {
        $currencies = Currency::all();
        $storage_providers = StorageProvider::all();

        return view('solution.solution_create', [
            'storage_providers' => $storage_providers,
            'currencies' => $currencies
        ]);
    }

    public function store(Request $request)
    {
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

        $solution = new Solution();
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

        return redirect('solutions')->with(['success_message' => 'Stuff has been Created successfully']);
    }

    public function edit($id)
    {
        $id = Solution::decrypted_id($id);
        $currencies = Currency::all();
        $solution = Solution::find($id);
        $storage_providers = StorageProvider::all();

        return view('solution.solution_edit', [
            'storage_providers' => $storage_providers,
            'currencies' => $currencies,
            'solution' => $solution
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
        $id = Solution::decrypted_id($id);
        $solution = Solution::find($id);
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

        return redirect()->back()->with(['success_message' => 'Solution has been update successfully']);
    }

    public function destroy(string $id)
    {
        $id = Solution::decrypted_id($id);
        Solution::find($id)->delete();
        return response()->json(array('response_type' => 1));
    }

    public function show(string $id)
    {

        $id = Solution::decrypted_id($id);
        $solution = Solution::with('currency', 'storageProvider')->where("id", $id)->first();

        return view('solution.solution_show', [
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
