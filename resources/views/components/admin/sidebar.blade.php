<aside class="hidden lg:block h-screen shrink-0 w-[270px] overflow-y-auto bg-bl-black text-white [&::-webkit-scrollbar]:hidden fixed left-0 top-0 z-40">
    <div class="flex h-full w-full flex-col gap-[40px] pt-[40px]">
        <!-- Logo -->
        <div class="px-[30px]">
            <a href="{{ route('admin.dashboard') }}" class="shrink-0 flex items-center gap-3">
                <img src="{{ asset(getWebConfiguration()->logo) }}" alt="logo" class="h-10 w-10 rounded-full bg-white p-0.5">
                <span class="font-bold text-sm truncate">{{ getWebConfiguration()->name }}</span>
            </a>
        </div>

        <!-- Navigation -->
        <nav class="flex flex-col gap-[40px] pb-[40px] px-[30px]">
            @hasrole('admin')
            <!-- GENERAL -->
            <section class="flex flex-col gap-[24px]">
                <h3 class="text-sm font-semibold leading-[21px] text-bl-secondary">GENERAL</h3>
                <ul class="flex flex-col gap-[20px]">
                    <li class="group {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}">
                            <div class="flex items-center gap-[10px]">
                                <i class="bi bi-grid text-lg group-[&.active]:text-bl-green group-hover:text-bl-green transition-all duration-300"></i>
                                <p class="group-[&.active]:font-semibold group-[&.active]:text-bl-green group-hover:text-bl-green group-hover:font-semibold transition-all duration-300 text-sm">Dashboard</p>
                            </div>
                        </a>
                    </li>
                    <li class="group {{ request()->is('admin/banners*') ? 'active' : '' }}">
                        <a href="{{ route('admin.banners.index') }}">
                            <div class="flex items-center gap-[10px]">
                                <i class="bi bi-image text-lg group-[&.active]:text-bl-green group-hover:text-bl-green transition-all duration-300"></i>
                                <p class="group-[&.active]:font-semibold group-[&.active]:text-bl-green group-hover:text-bl-green group-hover:font-semibold transition-all duration-300 text-sm">Banners</p>
                            </div>
                        </a>
                    </li>
                    <li class="group {{ request()->is('admin/galleries*') ? 'active' : '' }}">
                        <a href="{{ route('admin.galleries.index') }}">
                            <div class="flex items-center gap-[10px]">
                                <i class="bi bi-images text-lg group-[&.active]:text-bl-green group-hover:text-bl-green transition-all duration-300"></i>
                                <p class="group-[&.active]:font-semibold group-[&.active]:text-bl-green group-hover:text-bl-green group-hover:font-semibold transition-all duration-300 text-sm">Gallery</p>
                            </div>
                        </a>
                    </li>
                    <li class="group {{ request()->is('admin/achievements*') ? 'active' : '' }}">
                        <a href="{{ route('admin.achievements.index') }}">
                            <div class="flex items-center gap-[10px]">
                                <i class="bi bi-trophy text-lg group-[&.active]:text-bl-green group-hover:text-bl-green transition-all duration-300"></i>
                                <p class="group-[&.active]:font-semibold group-[&.active]:text-bl-green group-hover:text-bl-green group-hover:font-semibold transition-all duration-300 text-sm">Prestasi</p>
                            </div>
                        </a>
                    </li>
                    <li class="group {{ request()->is('admin/teachers*') ? 'active' : '' }}">
                        <a href="{{ route('admin.teachers.index') }}">
                            <div class="flex items-center gap-[10px]">
                                <i class="bi bi-person-badge text-lg group-[&.active]:text-bl-green group-hover:text-bl-green transition-all duration-300"></i>
                                <p class="group-[&.active]:font-semibold group-[&.active]:text-bl-green group-hover:text-bl-green group-hover:font-semibold transition-all duration-300 text-sm">Data Guru</p>
                            </div>
                        </a>
                    </li>
                    <li class="group {{ request()->is('admin/students*') ? 'active' : '' }}">
                        <a href="{{ route('admin.students.index') }}">
                            <div class="flex items-center gap-[10px]">
                                <i class="bi bi-people text-lg group-[&.active]:text-bl-green group-hover:text-bl-green transition-all duration-300"></i>
                                <p class="group-[&.active]:font-semibold group-[&.active]:text-bl-green group-hover:text-bl-green group-hover:font-semibold transition-all duration-300 text-sm">Data Siswa</p>
                            </div>
                        </a>
                    </li>
                    <li class="group {{ request()->is('admin/news*') ? 'active' : '' }}">
                        <a href="{{ route('admin.news.index') }}">
                            <div class="flex items-center gap-[10px]">
                                <i class="bi bi-newspaper text-lg group-[&.active]:text-bl-green group-hover:text-bl-green transition-all duration-300"></i>
                                <p class="group-[&.active]:font-semibold group-[&.active]:text-bl-green group-hover:text-bl-green group-hover:font-semibold transition-all duration-300 text-sm">Berita</p>
                            </div>
                        </a>
                    </li>
                    <li class="group {{ request()->is('admin/news-categories*') ? 'active' : '' }}">
                        <a href="{{ route('admin.news-categories.index') }}">
                            <div class="flex items-center gap-[10px]">
                                <i class="bi bi-tag text-lg group-[&.active]:text-bl-green group-hover:text-bl-green transition-all duration-300"></i>
                                <p class="group-[&.active]:font-semibold group-[&.active]:text-bl-green group-hover:text-bl-green group-hover:font-semibold transition-all duration-300 text-sm">Kategori Berita</p>
                            </div>
                        </a>
                    </li>
                    <li class="group {{ request()->is('admin/extracurriculars*') ? 'active' : '' }}">
                        <a href="{{ route('admin.extracurriculars.index') }}">
                            <div class="flex items-center gap-[10px]">
                                <i class="bi bi-activity text-lg group-[&.active]:text-bl-green group-hover:text-bl-green transition-all duration-300"></i>
                                <p class="group-[&.active]:font-semibold group-[&.active]:text-bl-green group-hover:text-bl-green group-hover:font-semibold transition-all duration-300 text-sm">Ekstrakurikuler</p>
                            </div>
                        </a>
                    </li>
                    <li class="group {{ request()->is('admin/graduations*') ? 'active' : '' }}">
                        <a href="{{ route('admin.graduations.index') }}">
                            <div class="flex items-center gap-[10px]">
                                <i class="bi bi-mortarboard text-lg group-[&.active]:text-bl-green group-hover:text-bl-green transition-all duration-300"></i>
                                <p class="group-[&.active]:font-semibold group-[&.active]:text-bl-green group-hover:text-bl-green group-hover:font-semibold transition-all duration-300 text-sm">Kelulusan</p>
                            </div>
                        </a>
                    </li>
                    <li class="group {{ request()->is('admin/guestbooks*') ? 'active' : '' }}">
                        <a href="{{ route('admin.guestbooks.index') }}">
                            <div class="flex items-center gap-[10px]">
                                <i class="bi bi-book text-lg group-[&.active]:text-bl-green group-hover:text-bl-green transition-all duration-300"></i>
                                <p class="group-[&.active]:font-semibold group-[&.active]:text-bl-green group-hover:text-bl-green group-hover:font-semibold transition-all duration-300 text-sm">Buku Tamu</p>
                            </div>
                        </a>
                    </li>
                </ul>
            </section>

            <!-- LAINNYA -->
            <section class="flex flex-col gap-[24px]">
                <h3 class="text-sm font-semibold leading-[21px] text-bl-secondary">LAINNYA</h3>
                <ul class="flex flex-col gap-[20px]">
                    <li class="group {{ request()->is('admin/web-configuration') ? 'active' : '' }}">
                        <a href="{{ route('admin.web-configuration') }}">
                            <div class="flex items-center gap-[10px]">
                                <i class="bi bi-gear text-lg group-[&.active]:text-bl-green group-hover:text-bl-green transition-all duration-300"></i>
                                <p class="group-[&.active]:font-semibold group-[&.active]:text-bl-green group-hover:text-bl-green group-hover:font-semibold transition-all duration-300 text-sm">Konfigurasi Web</p>
                            </div>
                        </a>
                    </li>
                    <li class="group">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center gap-[10px] w-full">
                                <i class="bi bi-box-arrow-left text-lg group-hover:text-bl-green transition-all duration-300"></i>
                                <p class="group-hover:text-bl-green group-hover:font-semibold transition-all duration-300 text-sm">Logout</p>
                            </button>
                        </form>
                    </li>
                </ul>
            </section>
            @else
            <!-- Petugas menu -->
            <section class="flex flex-col gap-[24px]">
                <h3 class="text-sm font-semibold leading-[21px] text-bl-secondary">MENU</h3>
                <ul class="flex flex-col gap-[20px]">
                    <li class="group {{ request()->is('petugas/guestbooks*') ? 'active' : '' }}">
                        <a href="{{ route('petugas.guestbooks.index') }}">
                            <div class="flex items-center gap-[10px]">
                                <i class="bi bi-book text-lg group-[&.active]:text-bl-green group-hover:text-bl-green transition-all duration-300"></i>
                                <p class="group-[&.active]:font-semibold group-[&.active]:text-bl-green group-hover:text-bl-green group-hover:font-semibold transition-all duration-300 text-sm">Buku Tamu</p>
                            </div>
                        </a>
                    </li>
                    <li class="group">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center gap-[10px] w-full">
                                <i class="bi bi-box-arrow-left text-lg group-hover:text-bl-green transition-all duration-300"></i>
                                <p class="group-hover:text-bl-green group-hover:font-semibold transition-all duration-300 text-sm">Logout</p>
                            </button>
                        </form>
                    </li>
                </ul>
            </section>
            @endhasrole
        </nav>
    </div>
</aside>
