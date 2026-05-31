<div class="rounded-3xl bg-white p-6">
    @if($attributes->get('title'))
        <h6 class="font-bold text-lg mb-4">{{ $attributes->get('title') }}</h6>
    @endif
    {{ $slot }}
</div>
