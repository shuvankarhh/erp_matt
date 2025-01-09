<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Contact;
use App\Models\Timezone;
use App\Models\Solution;
use App\Models\SaleInvoice;
use App\Models\Organization;
use Illuminate\Http\Request;

class SaleInvoiceController extends Controller
{
    public function index()
    {
        $sale_invoices = SaleInvoice::paginate();

        // return view('sale_invoices.index', compact('sale_invoices'));
    }

    public function create()
    {
        $timezones = Timezone::pluck('name', 'id');
        $organizations = Organization::pluck('name', 'id');
        $staffs = Staff::pluck('name', 'id');
        $contacts = Contact::pluck('name', 'id');
        $solutions = Solution::pluck('name', 'id');

        // return view('sale_invoices.create', compact('timezones', 'organizations', 'staffs', 'contacts', 'solutions'));
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
