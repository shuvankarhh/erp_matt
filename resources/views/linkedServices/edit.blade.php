<x-modal-form title="Add Linked service" action="{{ route('linked-services.update',['linked_service' => $linkedServices->id]) }}">   

    <x-input class="mb-2" label="Service Name" name="service_name" value="{{ old('service_name') ?? $linkedServices->service_name }}" placeholder="Enter service name" required />

    {{-- <x-select class="mb-2" label="Linked Service Types" name="type" :options="$linkedServiceTypes->" placeholder="Select Type"
    selected="{{ old('type')  }}" required /> --}}

    <label for="" class="mb-2 w-full">Linked Service Types <span class="text-red-500">*</span></label>
    <br>
    <select name="type" id="service_type" class="form-select block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mb-2" required>
        <option value="">Select service type</option>
        @foreach ($linkedServiceTypes as $linkedServiceType)
            @if ($linkedServiceType->id == $linkedServices->type)
                
                <option value="{{$linkedServiceType->id}}" selected>{{$linkedServiceType->name}}</option>
            @else
                
                <option value="{{$linkedServiceType->id}}">{{$linkedServiceType->name}}</option>
            @endif
        @endforeach
    </select>

    <label for="" class="mb-2 w-full">Linked Service Subtype </label>
    <br>
    <select name="subtype" id="service_sub_type" class="form-select block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mb-2" >
        @foreach ($linkedServiceSubType as $linkedServiceSubType)
            @if ($linkedServiceType->id == $linkedServices->type)
                
                <option value="{{$linkedServiceType->id}}" selected>{{$linkedServiceType->name}}</option>
            @else
                
                <option value="{{$linkedServiceType->id}}">{{$linkedServiceType->name}}</option>
            @endif
        @endforeach
    </select>

    <x-input class="mb-2" label="Insurance Policy" name="insurance_policy" value="{{ old('insurance_policy') ?? $linkedServices->insurance_policy }}" placeholder="Enter Insurance Policy"  />

    {{-- <x-input class="mb-2" label="Note" name="" value="{{ old('notes') }}" placeholder="Enter notes" required /> --}}

    <label for="" class="mb-2 w-full">Note </label>
    <br>
    <textarea class="mt-2 w-full" name="notes" id="" cols="10" rows="5" placeholder="Enter notes ..."> {{ $linkedServices->notes ?? null}} </textarea>
    
</x-modal-form>
