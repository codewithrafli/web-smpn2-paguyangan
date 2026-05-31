<div class="mb-5">
    <label for="{{ $attributes->get('name') }}" class="font-semibold text-sm mb-2 block">{{ $attributes->get('label') }}</label>
    <div class="w-full rounded-full border border-[#E0E1EA] px-6 flex items-center transition-all duration-300 focus-within:ring-2 focus-within:ring-bl-blue focus-within:border-transparent {{ $errors->has($attributes->get('name')) ? 'ring-2 ring-red-500' : '' }}">
        <input type="{{ $type ?? 'text' }}" name="{{ $attributes->get('name') }}" value="{{ $attributes->get('value') }}"
            id="{{ $attributes->get('id', $attributes->get('name')) }}"
            class="appearance-none outline-none w-full my-3 font-semibold placeholder:font-normal placeholder:text-bl-secondary bg-transparent text-sm"
            {{ $attributes->except(['class', 'label', 'name', 'value', 'id']) }}>
    </div>
    @if ($errors->has($attributes->get('name')))
        <p class="text-red-500 text-sm mt-1">{{ $errors->first($attributes->get('name')) }}</p>
    @endif
</div>
