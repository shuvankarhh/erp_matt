<div {{ $attributes->has('class') ? "class={$attributes->get('class')}" : '' }}>
    <label for="{{ $name }}" class="text-gray-800 text-sm font-medium inline-block mb-2">
        {{ $label }}
        @if ($required)
            <span class="text-red-500">*</span>
        @endif
    </label>

    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
        class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        placeholder="{{ $placeholder }}" {{ $attributes->merge(['class' => 'form-input']) }}
        @if ($type == 'number') min="0" @endif @if ($required) required @endif>

    @error($name)
        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
    @enderror
</div>
