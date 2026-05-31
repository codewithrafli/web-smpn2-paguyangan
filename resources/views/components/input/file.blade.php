<div class="mb-5">
    <label class="font-semibold text-sm mb-2 block" for="{{ $attributes->get('name') }}">{{ $attributes->get('label') }}</label>
    <input
        type="file" id="{{ $attributes->get('name') }}" name="{{ $attributes->get('name') }}"
        class="block w-full text-sm text-bl-secondary file:mr-4 file:py-2.5 file:px-5 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-bl-blue file:text-white hover:file:shadow-[0_8px_20px_0_#007AFF91] file:cursor-pointer file:transition-all file:duration-300"
        {{ $attributes->except(['class', 'label', 'name']) }}>
    @if ($errors->has($attributes->get('name')))
        <p class="text-red-500 text-sm mt-1">{{ $errors->first($attributes->get('name')) }}</p>
    @endif
</div>
