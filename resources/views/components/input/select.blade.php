<div class="mb-5">
    <label class="font-semibold text-sm mb-2 block" for="{{ $attributes->get('name') }}">{{ $attributes->get('label') }}</label>
    <div class="w-full rounded-full border border-[#E0E1EA] px-6 transition-all duration-300 focus-within:ring-2 focus-within:ring-bl-blue focus-within:border-transparent {{ $errors->has($attributes->get('name')) ? 'ring-2 ring-red-500' : '' }}">
        <select id="{{ $attributes->get('id', $attributes->get('name')) }}" name="{{ $attributes->get('name') }}"
            class="appearance-none outline-none w-full my-3 font-semibold bg-transparent text-sm cursor-pointer"
            {{ $attributes->except(['class', 'label', 'name', 'id']) }}>
            {{ $slot }}
        </select>
    </div>
    @if ($errors->has($attributes->get('name')))
        <p class="text-red-500 text-sm mt-1">{{ $errors->first($attributes->get('name')) }}</p>
    @endif
</div>
