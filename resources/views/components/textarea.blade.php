<div {{ $attributes->has('class') ? "class={$attributes->get('class')}" : '' }}>
    <label for="{{ $name }}" class="text-gray-800 text-sm font-medium inline-block mb-1 relative">
        {{ $label }}
        @if ($required)
            <span class="text-red-600 absolute" style="top: -2px; right: -6px">*</span>
        @endif
    </label>

    <textarea name="{{ $name }}" id="{{ $name }}"
        class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        placeholder="{{ $placeholder }}" rows="{{ $rows }}" {{ $attributes->merge(['class' => 'form-input']) }}>{{ old($name, $value) }}</textarea>

    @error($name)
        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
    @enderror
</div>
