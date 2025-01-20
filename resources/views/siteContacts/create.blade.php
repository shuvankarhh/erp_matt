<x-modal-form title="Add Site Contact" action="{{ route('site-contacts.store') }}">

    <x-input class="mb-2" label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Contact Name" required />
    
    <x-input class="mb-2" label="Email" name="email" value="{{ old('email') }}" placeholder="Enter Contact Email" type="email" required />
    
    <x-input class="mb-2" label="Phone" name="phone" value="{{ old('phone') }}" placeholder="Enter Contact Phone" />
    
    <x-input class="mb-2" label="Role" name="role" value="{{ old('role') }}" placeholder="Enter Contact Role" />
    
    

</x-modal-form>
