<x-layouts.admin title="Dashboard">
    <header>
        <h1 id="welcomeMessage" class="text-[26px] font-bold leading-[39px]">Selamat Datang, {{ Auth::user()->name }}</h1>
        <p class="text-sm leading-[21px] text-bl-secondary">Dashboard admin {{ getWebConfiguration()->name }}</p>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-[20px]">
        <div class="rounded-3xl bg-white p-6 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center shrink-0">
                <i class="bi bi-people text-xl text-bl-blue"></i>
            </div>
            <div>
                <p class="text-bl-secondary text-sm">Jumlah Pendatang</p>
                <h3 class="font-bold text-2xl">{{ \Sarfraznawaz2005\VisitLog\Models\VisitLog::count() }}</h3>
            </div>
        </div>
        <div class="rounded-3xl bg-white p-6 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-green-50 flex items-center justify-center shrink-0">
                <i class="bi bi-trophy text-xl text-green-500"></i>
            </div>
            <div>
                <p class="text-bl-secondary text-sm">Total Prestasi</p>
                <h3 class="font-bold text-2xl">{{ \App\Models\Achievement::count() }}</h3>
            </div>
        </div>
        <div class="rounded-3xl bg-white p-6 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-orange-50 flex items-center justify-center shrink-0">
                <i class="bi bi-newspaper text-xl text-bl-light-orange"></i>
            </div>
            <div>
                <p class="text-bl-secondary text-sm">Total Berita</p>
                <h3 class="font-bold text-2xl">{{ \App\Models\News::count() }}</h3>
            </div>
        </div>
        <div class="rounded-3xl bg-white p-6 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-purple-50 flex items-center justify-center shrink-0">
                <i class="bi bi-images text-xl text-purple-500"></i>
            </div>
            <div>
                <p class="text-bl-secondary text-sm">Total Gallery</p>
                <h3 class="font-bold text-2xl">{{ \App\Models\Gallery::count() }}</h3>
            </div>
        </div>
    </div>

    @push('custom-scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var h = new Date().getHours();
                var msg = h < 12 ? 'Selamat Pagi' : h < 18 ? 'Selamat Siang' : 'Selamat Malam';
                document.getElementById('welcomeMessage').innerHTML = msg + ', {{ Auth::user()->name }}';
            });
        </script>
    @endpush
</x-layouts.admin>
