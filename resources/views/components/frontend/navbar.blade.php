<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container py-2">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset(getWebConfiguration()->logo) }}" alt="logo">
        </a>

        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
            <ul class="navbar-nav   mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? ' active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('guru-dan-karyawan', 'struktur-organisasi', 'visi-misi', 'siswa', 'ekstrakurikuler*') ? ' active' : '' }}"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil Sekolah
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm p-1">
                        <li><a class="dropdown-item rounded-1 {{ request()->is('visi-misi') ? ' active' : '' }}"
                                href="{{ route('vision-mission') }}">Visi Misi</a></li>
                        <li><a class="dropdown-item rounded-1 mt-1 {{ request()->is('guru-dan-karyawan') ? ' active' : '' }}"
                                href="{{ route('teacher') }}">Guru Dan Karyawan</a></li>
                        <li>
                            <a class="dropdown-item rounded-1 mt-1 {{ request()->is('siswa') && request('status') == 'active' ? ' active' : '' }}"
                                href="{{ route('student', ['status' => 'active']) }}">Siswa</a>
                        </li>
                        <a class="dropdown-item rounded-1 mt-1 {{ request()->has('status') && request('status') == 'inactive' ? ' active' : '' }}"
                            href="{{ route('student', ['status' => 'inactive']) }}">Alumni</a>
                </li>
                <li><a class="dropdown-item rounded-1 mt-1 {{ request()->is('struktur-organisasi') ? ' active' : '' }}"
                        href="{{ route('organizational-structure') }}">Struktur Organisasi</a></li>
            </ul>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle {{ request()->is('prestasi', 'ekstrakurikuler*') ? ' active' : '' }}"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Akademik
                </a>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm p-1" role="menu">
                    <li><a class="dropdown-item rounded-1 {{ request()->is('prestasi') ? ' active' : '' }}"
                            href="{{ route('achievement') }}">Prestasi</a></li>
                    <li><a class="dropdown-item rounded-1 mt-1 {{ request()->is('ekstrakurikuler*') ? ' active' : '' }}"
                            href="{{ route('extracurricular') }}">Ekstarkulikuler</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('berita') ? ' active' : '' }}"
                    href="{{ route('news') }}">Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('gallery') ? ' active' : '' }}"
                    href="{{ route('gallery') }}">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('kelulusan') ? ' active' : '' }}"
                    href="{{ route('graduation') }}">Pengumuman Kelulusan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://perpustakaan.smpn2paguyangan.sch.id/">Perpustakaan</a>
            </li>

            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Sumber Belajar
                </a>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm p-1" role="menu">
                    <li>
                        <a class="dropdown-item rounded-1" href="https://bintangpusnas.perpusnas.go.id">
                            bintangpusnas.perpusnas.go.id
                        </a>
                        <a class="dropdown-item rounded-1 mt-1" href="https://e-resources.perpusnas.go.id">
                            e-resources.perpusnas.go.id
                        </a>
                        <a class="dropdown-item rounded-1 mt-1" href="https://ipunas.id">
                            ipunas.id
                        </a>
                        <a class="dropdown-item rounded-1 mt-1" href="https://buku.kemdikbud.go.id">
                            buku.kemdikbud.go.id
                        </a>
                        <a class="dropdown-item rounded-1 mt-1" href="https://budi.kemdikbud.go.id">
                            budi.kemdikbud.go.id
                        </a>
                        <a class="dropdown-item rounded-1 mt-1" href="https://perpustakaan.kemdikbud.go.id">
                            perpustakaan.kemdikbud.go.id
                        </a>
                    </li>
                </ul>
            </li>
            </ul>
        </div>
    </div>
</nav>
