<nav class="flex w-full bg-white py-[30px] relative z-50">
    <div class="flex items-center justify-between w-full max-w-[1130px] mx-auto px-4">
        <a href="{{ route('home') }}" class="flex shrink-0">
            <img src="{{ asset(getWebConfiguration()->logo) }}" class="h-10 shrink-0" alt="logo">
        </a>

        <!-- Mobile hamburger -->
        <button id="mobileMenuToggle" class="lg:hidden flex flex-col gap-1.5 p-2">
            <span class="block w-6 h-0.5 bg-bl-black transition-all duration-300"></span>
            <span class="block w-6 h-0.5 bg-bl-black transition-all duration-300"></span>
            <span class="block w-6 h-0.5 bg-bl-black transition-all duration-300"></span>
        </button>

        <!-- Desktop Nav -->
        <ul class="hidden lg:flex items-center gap-8">
            <!-- Profil Sekolah Dropdown -->
            <li class="relative group">
                <button class="flex items-center gap-1 transition-all duration-300 hover:font-bold {{ request()->is('guru-dan-karyawan*', 'struktur-organisasi', 'visi-misi', 'siswa*') ? 'font-bold' : '' }}">
                    Profil
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <ul class="absolute top-full left-0 mt-2 w-[220px] bg-white rounded-2xl shadow-[0px_10px_30px_0px_#B8B8B840] border border-bl-grey py-3 px-3 hidden group-hover:flex flex-col gap-1 z-50">
                    <li><a href="{{ route('vision-mission') }}" class="block px-3 py-2 rounded-xl hover:bg-bl-grey transition-all duration-300 {{ request()->is('visi-misi') ? 'font-semibold text-bl-blue' : '' }}">Visi & Misi</a></li>
                    <li><a href="{{ route('teacher') }}" class="block px-3 py-2 rounded-xl hover:bg-bl-grey transition-all duration-300 {{ request()->is('guru-dan-karyawan*') ? 'font-semibold text-bl-blue' : '' }}">Guru & Karyawan</a></li>
                    <li><a href="{{ route('student', ['status' => 'active']) }}" class="block px-3 py-2 rounded-xl hover:bg-bl-grey transition-all duration-300 {{ request()->is('siswa*') ? 'font-semibold text-bl-blue' : '' }}">Siswa</a></li>
                    <li><a href="{{ route('organizational-structure') }}" class="block px-3 py-2 rounded-xl hover:bg-bl-grey transition-all duration-300 {{ request()->is('struktur-organisasi') ? 'font-semibold text-bl-blue' : '' }}">Struktur Organisasi</a></li>
                </ul>
            </li>

            <!-- Akademik Dropdown -->
            <li class="relative group">
                <button class="flex items-center gap-1 transition-all duration-300 hover:font-bold {{ request()->is('prestasi', 'ekstrakurikuler*', 'kelulusan') ? 'font-bold' : '' }}">
                    Akademik
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <ul class="absolute top-full left-0 mt-2 w-[200px] bg-white rounded-2xl shadow-[0px_10px_30px_0px_#B8B8B840] border border-bl-grey py-3 px-3 hidden group-hover:flex flex-col gap-1 z-50">
                    <li><a href="{{ route('achievement') }}" class="block px-3 py-2 rounded-xl hover:bg-bl-grey transition-all duration-300 {{ request()->is('prestasi') ? 'font-semibold text-bl-blue' : '' }}">Prestasi</a></li>
                    <li><a href="{{ route('extracurricular') }}" class="block px-3 py-2 rounded-xl hover:bg-bl-grey transition-all duration-300 {{ request()->is('ekstrakurikuler*') ? 'font-semibold text-bl-blue' : '' }}">Ekstrakurikuler</a></li>
                    <li><a href="{{ route('graduation') }}" class="block px-3 py-2 rounded-xl hover:bg-bl-grey transition-all duration-300 {{ request()->is('kelulusan') ? 'font-semibold text-bl-blue' : '' }}">Kelulusan</a></li>
                </ul>
            </li>

            <li class="transition-all duration-300 hover:font-bold {{ request()->is('berita*') ? 'font-bold' : '' }}">
                <a href="{{ route('news') }}">Berita</a>
            </li>
            <li class="transition-all duration-300 hover:font-bold {{ request()->is('gallery') ? 'font-bold' : '' }}">
                <a href="{{ route('gallery') }}">Gallery</a>
            </li>

            <!-- Lainnya Dropdown -->
            <li class="relative group">
                <button class="flex items-center gap-1 transition-all duration-300 hover:font-bold">
                    Lainnya
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <ul class="absolute top-full right-0 mt-2 w-[260px] bg-white rounded-2xl shadow-[0px_10px_30px_0px_#B8B8B840] border border-bl-grey py-3 px-3 hidden group-hover:flex flex-col gap-1 z-50">
                    <li><a href="https://perpustakaan.smpn2paguyangan.sch.id/" target="_blank" class="block px-3 py-2 rounded-xl hover:bg-bl-grey transition-all duration-300">Perpustakaan</a></li>
                    <li class="border-t border-bl-border my-1"></li>
                    <li><a href="https://bintangpusnas.perpusnas.go.id" target="_blank" class="block px-3 py-2 rounded-xl hover:bg-bl-grey transition-all duration-300 text-sm">bintangpusnas.perpusnas.go.id</a></li>
                    <li><a href="https://e-resources.perpusnas.go.id" target="_blank" class="block px-3 py-2 rounded-xl hover:bg-bl-grey transition-all duration-300 text-sm">e-resources.perpusnas.go.id</a></li>
                    <li><a href="https://ipunas.id" target="_blank" class="block px-3 py-2 rounded-xl hover:bg-bl-grey transition-all duration-300 text-sm">ipunas.id</a></li>
                    <li><a href="https://buku.kemdikbud.go.id" target="_blank" class="block px-3 py-2 rounded-xl hover:bg-bl-grey transition-all duration-300 text-sm">buku.kemdikbud.go.id</a></li>
                </ul>
            </li>
        </ul>

        <!-- Login Button -->
        <a href="{{ route('login') }}" class="hidden lg:block rounded-full py-3 px-6 bg-bl-black text-white font-semibold transition-all duration-300 hover:shadow-[0_8px_20px_0_#0F122A91]">
            Login
        </a>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden fixed inset-0 top-[80px] bg-white z-40 lg:hidden overflow-y-auto">
        <ul class="flex flex-col p-6 gap-4">
            <li><a href="{{ route('home') }}" class="block py-2 {{ request()->is('/') ? 'font-bold text-bl-blue' : '' }}">Home</a></li>

            <li>
                <button onclick="this.nextElementSibling.classList.toggle('hidden')" class="flex items-center justify-between w-full py-2 {{ request()->is('guru-dan-karyawan*', 'struktur-organisasi', 'visi-misi', 'siswa*') ? 'font-bold' : '' }}">
                    Profil
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <ul class="hidden flex flex-col gap-1 pl-4 mt-2">
                    <li><a href="{{ route('vision-mission') }}" class="block py-2 text-sm">Visi & Misi</a></li>
                    <li><a href="{{ route('teacher') }}" class="block py-2 text-sm">Guru & Karyawan</a></li>
                    <li><a href="{{ route('student', ['status' => 'active']) }}" class="block py-2 text-sm">Siswa</a></li>
                    <li><a href="{{ route('organizational-structure') }}" class="block py-2 text-sm">Struktur Organisasi</a></li>
                </ul>
            </li>

            <li>
                <button onclick="this.nextElementSibling.classList.toggle('hidden')" class="flex items-center justify-between w-full py-2 {{ request()->is('prestasi', 'ekstrakurikuler*', 'kelulusan') ? 'font-bold' : '' }}">
                    Akademik
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <ul class="hidden flex flex-col gap-1 pl-4 mt-2">
                    <li><a href="{{ route('achievement') }}" class="block py-2 text-sm">Prestasi</a></li>
                    <li><a href="{{ route('extracurricular') }}" class="block py-2 text-sm">Ekstrakurikuler</a></li>
                    <li><a href="{{ route('graduation') }}" class="block py-2 text-sm">Kelulusan</a></li>
                </ul>
            </li>

            <li><a href="{{ route('news') }}" class="block py-2 {{ request()->is('berita*') ? 'font-bold text-bl-blue' : '' }}">Berita</a></li>
            <li><a href="{{ route('gallery') }}" class="block py-2 {{ request()->is('gallery') ? 'font-bold text-bl-blue' : '' }}">Gallery</a></li>
            <li><a href="https://perpustakaan.smpn2paguyangan.sch.id/" target="_blank" class="block py-2">Perpustakaan</a></li>

            <li class="mt-4">
                <a href="{{ route('login') }}" class="block text-center rounded-full py-3 px-6 bg-bl-black text-white font-semibold">Login</a>
            </li>
        </ul>
    </div>
</nav>

<script>
    document.getElementById('mobileMenuToggle')?.addEventListener('click', function() {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    });
</script>
