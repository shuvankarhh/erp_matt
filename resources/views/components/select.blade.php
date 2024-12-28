<div {{ $attributes->has('class') ? "class={$attributes->get('class')}" : '' }}>
    <label for="{{ $name }}" class="text-gray-800 text-sm font-medium inline-block mb-1">{{ $label }}@if ($required)<span class="text-red-500">*</span>
        @endif
    </label>

    <select name="{{ $name }}" id="{{ $name }}"
        class="form-select block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"  @if ($required) required @endif>

        @if ($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif

        @if ($options)
            @foreach ($options as $key => $value)
                <option value="{{ $key }}" {{ $key == $selected ? 'selected' : '' }}>{{ $value }}
                </option>
            @endforeach
        @else
            {{ $slot }}
        @endif
    </select>

    @error($name)
        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
    @enderror
</div>


{{-- <select name="{{ $name }}" id="{{ $name }}"
    class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $attributes->get('class') }}"
    {{ $attributes->except(['class', 'wrapperClass']) }}>
    @if ($placeholder)
        <option value="">{{ $placeholder }}</option>
    @endif

    @if ($options)
        @foreach ($options as $key => $value)
            <option value="{{ $key }}" {{ $key == $selected ? 'selected' : '' }}>{{ $value }}
            </option>
        @endforeach
    @else
        {{ $slot }}
    @endif
</select> --}}
