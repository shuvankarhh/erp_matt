<x-modal-top-layout title="Create New Project" action="{{ route('tags.store') }}">
    
    <div class="flex justify-between">
        <label for="inTheCustomer" class="w-1/2">Is the Customer</label>
        <select name="inTheCustomer" class="w-1/2" id="inTheCustomer" onchange="inTheCustomers()">
            <option value="">---select---</option>
            <option value="existing">Add Existing</option>
            <option value="createNew">Create New</option>
        </select>
    </div>


    
    <div class="customerList flex justify-between mt-2 hidden">
        <label for="" class="w-1/2">Is the Customer</label>
        <select name="inTheCustomer" class="w-1/2" id="inTheCustomer">
            <option value="existing">Add Existing</option>
        </select>
    </div>

</x-modal-top-layout>
