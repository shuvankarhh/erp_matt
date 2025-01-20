<x-modal-form title="Add Tag" action="{{ route('site-contacts.update', ['site_contact' => $siteContacts->id]) }}" put>
    <x-input class="mb-2" label="Name" name="name" placeholder="Enter Contact Name" value="{{ old('name') ?? $siteContacts->name }}" required />
    
    <x-input class="mb-2" label="Email" name="email"  value="{{ old('email') ?? $siteContacts->email }}" placeholder="Enter Contact Email" type="email" required />
    
    <x-input class="mb-2" label="Phone" name="phone" value="{{ old('phone') ?? $siteContacts->phone }}" placeholder="Enter Contact Phone" />
    
    <x-input class="mb-2" label="Role" name="role"  value="{{ old('name') ?? $siteContacts->role }}" placeholder="Enter Contact Role" />
</x-modal-form>