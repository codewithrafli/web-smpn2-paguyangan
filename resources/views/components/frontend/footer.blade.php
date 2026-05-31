<footer class="bg-[#0F122A] p-[70px_10px] mt-[100px]">
    <div class="flex flex-col gap-[50px] w-full max-w-[1130px] mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            <!-- Logo & Info -->
            <div class="flex flex-col gap-4">
                <a href="{{ route('home') }}">
                    <img src="{{ asset(getWebConfiguration()->logo) }}" alt="logo" class="h-14 w-14 rounded-full bg-white p-1">
                </a>
                <p class="text-white font-semibold text-lg">{{ getWebConfiguration()->name }}</p>
                <p class="text-bl-secondary text-sm leading-[24px]">{{ getWebConfiguration()->description }}</p>
            </div>

            <!-- Tautan -->
            <div class="flex flex-col gap-4">
                <h5 class="text-white font-semibold text-lg">Tautan</h5>
                <ul class="flex flex-col gap-3">
                    <li><a href="{{ route('home') }}" class="text-bl-secondary hover:text-white transition-all duration-300 text-sm">Beranda</a></li>
                    <li><a href="{{ route('achievement') }}" class="text-bl-secondary hover:text-white transition-all duration-300 text-sm">Prestasi</a></li>
                    <li><a href="{{ route('extracurricular') }}" class="text-bl-secondary hover:text-white transition-all duration-300 text-sm">Ekstrakurikuler</a></li>
                    <li><a href="{{ route('gallery') }}" class="text-bl-secondary hover:text-white transition-all duration-300 text-sm">Gallery</a></li>
                    <li><a href="{{ route('graduation') }}" class="text-bl-secondary hover:text-white transition-all duration-300 text-sm">Kelulusan</a></li>
                </ul>
            </div>

            <!-- Berita Terbaru -->
            <div class="flex flex-col gap-4">
                <h5 class="text-white font-semibold text-lg">Berita Terbaru</h5>
                <ul class="flex flex-col gap-3">
                    @foreach (\App\Models\News::orderBy('created_at', 'desc')->take(3)->get() as $news)
                        <li><a href="{{ route('news.show', $news->slug) }}" class="text-bl-secondary hover:text-white transition-all duration-300 text-sm line-clamp-2">{{ $news->title }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Alamat -->
            <div class="flex flex-col gap-4">
                <h5 class="text-white font-semibold text-lg">Alamat Kami</h5>
                <p class="text-bl-secondary text-sm leading-[24px]">{{ getWebConfiguration()->address }}</p>
                @if(getWebConfiguration()->phone)
                    <p class="text-bl-secondary text-sm"><i class="bi bi-telephone"></i> {{ getWebConfiguration()->phone }}</p>
                @endif
                @if(getWebConfiguration()->email)
                    <p class="text-bl-secondary text-sm"><i class="bi bi-envelope"></i> {{ getWebConfiguration()->email }}</p>
                @endif
            </div>
        </div>

        <!-- Divider -->
        <hr class="border-dashed border-[#2A2D42]">

        <!-- Bottom -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-bl-secondary text-sm">&copy; {{ date('Y') }} {{ getWebConfiguration()->name }}. All rights reserved.</p>
            <div class="flex items-center gap-4">
                @if(getWebConfiguration()->facebook)
                    <a href="{{ getWebConfiguration()->facebook }}" class="text-bl-secondary hover:text-white transition-all duration-300 text-xl"><i class="bi bi-facebook"></i></a>
                @endif
                @if(getWebConfiguration()->instagram)
                    <a href="{{ getWebConfiguration()->instagram }}" class="text-bl-secondary hover:text-white transition-all duration-300 text-xl"><i class="bi bi-instagram"></i></a>
                @endif
                @if(getWebConfiguration()->youtube)
                    <a href="{{ getWebConfiguration()->youtube }}" class="text-bl-secondary hover:text-white transition-all duration-300 text-xl"><i class="bi bi-youtube"></i></a>
                @endif
            </div>
        </div>
    </div>
</footer>
