<x-layouts.frontend title="{{ getWebConfiguration()->name }}">
    @push('plugin-styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/lightbox/css/lightbox.css') }}">
    @endpush

    <!-- ======= Hero Banner ======= -->
    <x-frontend.banner>
        @foreach ($banners as $banner)
            <div class="swiper-slide">
                <div class="w-full h-[300px] md:h-[500px]">
                    <img src="{{ asset($banner->desktop_image) }}" alt="banner" class="hidden lg:block w-full h-full object-cover">
                    <img src="{{ asset($banner->mobile_image) }}" alt="banner" class="block lg:hidden w-full h-full object-cover">
                </div>
            </div>
        @endforeach
    </x-frontend.banner>

    <!-- ======= Welcome / Stats Section ======= -->
    <section class="w-full max-w-[1130px] mx-auto px-4 py-[70px]">
        <div class="flex flex-col lg:flex-row items-center gap-[50px]">
            <div class="flex-1">
                <h2 class="font-extrabold text-[28px] md:text-[36px] leading-[42px] md:leading-[54px]">
                    Selamat Datang di <br> {{ getWebConfiguration()->name }}
                </h2>
            </div>
            <div class="flex-1">
                <p class="text-bl-secondary leading-[28px]">
                    {{ getWebConfiguration()->name }} adalah {{ getWebConfiguration()->description }}
                </p>
            </div>
        </div>
    </section>

    <!-- ======= Berita Terbaru ======= -->
    <section class="w-full max-w-[1130px] mx-auto px-4 pb-[70px]">
        <div class="flex items-center justify-between mb-[30px]">
            <h2 class="font-extrabold text-[28px] leading-[42px]">Berita Terbaru</h2>
            <a href="{{ route('news') }}" class="text-bl-blue font-semibold hover:underline">Lihat Semua</a>
        </div>
        <x-frontend.card.news :news="$news" />
    </section>

    <!-- ======= Sambutan Kepala Sekolah ======= -->
    <section class="bg-bl-grey py-[70px]">
        <div class="w-full max-w-[1130px] mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-[50px]">
                <div class="lg:w-[300px] shrink-0">
                    <img src="{{ getWebConfiguration()->headmaster_image }}" alt="Kepala Sekolah" class="w-full rounded-[30px] object-cover">
                    <p class="text-center mt-4 font-semibold text-lg">{{ getWebConfiguration()->headmaster_name }}</p>
                </div>
                <div class="flex-1">
                    <span class="inline-block rounded-full py-2 px-5 bg-bl-blue text-white font-semibold text-sm mb-4">Sambutan Kepala Sekolah</span>
                    <div class="text-bl-secondary leading-[28px] prose max-w-none">
                        {!! \Illuminate\Support\Str::markdown(getWebConfiguration()->headmaster_message) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Gallery Preview ======= -->
    <section class="w-full max-w-[1130px] mx-auto px-4 py-[70px]">
        <h2 class="font-extrabold text-[28px] leading-[42px] mb-[30px]">Gallery</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-[20px]">
            @foreach ($galleries as $gallery)
                <a href="{{ asset($gallery->image) }}" class="block overflow-hidden rounded-[20px]" data-lightbox="gambar" data-title="{{ $gallery->description }}">
                    <img src="{{ asset($gallery->image) }}" alt="image" class="w-full h-[200px] object-cover hover:scale-105 transition-transform duration-300">
                </a>
            @endforeach
        </div>
    </section>

    @push('plugin-scripts')
        <script src="{{ asset('frontend/assets/plugins/lightbox/js/lightbox-plus-jquery.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @endpush

    @push('custom-scripts')
        <script>
            lightbox.option({ 'resizeDuration': 200, 'wrapAround': true });

            var swiper = new Swiper(".bannerSwiper", {
                effect: "fade",
                fadeEffect: { crossFade: true },
                pagination: { el: ".swiper-pagination" },
                autoplay: { delay: 5000 },
                loop: true,
            });
        </script>
    @endpush
</x-layouts.frontend>
