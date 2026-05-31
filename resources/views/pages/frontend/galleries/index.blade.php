<x-layouts.frontend title="Gallery">
    @push('plugin-styles')
        <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/lightbox/css/lightbox.css') }}">
    @endpush

    <x-frontend.header>
        <x-slot name="title">Gallery</x-slot>
        <x-slot name="description">Berbagai Foto Kegiatan {{ getWebConfiguration()->name }}</x-slot>
    </x-frontend.header>

    <div class="w-full max-w-[1130px] mx-auto px-4 mt-[50px] mb-[100px]">
        <div class="grid grid-cols-2 md:grid-cols-3 gap-[20px]">
            @foreach ($galleries as $gallery)
                <a href="{{ asset($gallery->image) }}" class="block overflow-hidden rounded-[20px]" data-lightbox="gambar" data-title="{{ $gallery->description }}">
                    <img src="{{ asset($gallery->image) }}" alt="image" class="w-full h-[200px] md:h-[250px] object-cover hover:scale-105 transition-transform duration-300">
                </a>
            @endforeach
        </div>
    </div>

    @push('plugin-scripts')
        <script src="{{ asset('frontend/assets/plugins/lightbox/js/lightbox-plus-jquery.min.js') }}"></script>
        <script>lightbox.option({ 'resizeDuration': 200, 'wrapAround': true });</script>
    @endpush
</x-layouts.frontend>
