@push('plugin-styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endpush

<div class="mb-5">
    <label for="{{ $attributes->get('name') }}" class="font-semibold text-sm mb-2 block">{{ $attributes->get('label') }}</label>
    <textarea name="{{ $attributes->get('name') }}" id="mde" cols="30" rows="10"
        class="w-full rounded-3xl border border-[#E0E1EA] p-4 outline-none text-sm"
        {{ $attributes->except(['class', 'label', 'name', 'value']) }}>{{ $attributes->get('value') }}</textarea>
    @if ($errors->has($attributes->get('name')))
        <p class="text-red-500 text-sm mt-1">{{ $errors->first($attributes->get('name')) }}</p>
    @endif
</div>

@push('plugin-scripts')
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
@endpush

@push('custom-scripts')
    <script>
        var simplemde = new SimpleMDE({ element: document.getElementById("mde") });
    </script>
@endpush
