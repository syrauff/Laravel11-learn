@props(['name', 'label', 'type' => 'text', 'value' => ''])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>

    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" 
        value="{{ $value }}"
        {{ $attributes->merge(['class' => 'mt-1 block w-full text-md border rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 ' . ($errors->has($name) ? 'border-red-500' : 'border-gray-300')]) }}>

    @error($name)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
