<div class="mb-5">
    <label for="{{ $attributes->get('name') }}" class="font-semibold text-sm mb-2 block">{{ $attributes->get('label') }}</label>
    <div class="w-full rounded-3xl border border-[#E0E1EA] px-6 transition-all duration-300 focus-within:ring-2 focus-within:ring-bl-blue focus-within:border-transparent {{ $errors->has($attributes->get('name')) ? 'ring-2 ring-red-500' : '' }}">
        <textarea name="{{ $attributes->get('name') }}"
            id="{{ $attributes->get('id', $attributes->get('name')) }}"
            rows="4"
            class="appearance-none outline-none w-full my-3 font-semibold placeholder:font-normal placeholder:text-bl-secondary bg-transparent text-sm resize-y"
            {{ $attributes->except(['class', 'label', 'name', 'value', 'id']) }}>{{ $attributes->get('value') }}</textarea>
    </div>
    @if ($errors->has($attributes->get('name')))
        <p class="text-red-500 text-sm mt-1">{{ $errors->first($attributes->get('name')) }}</p>
    @endif
</div>
