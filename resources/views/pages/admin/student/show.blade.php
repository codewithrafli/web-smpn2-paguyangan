<x-layouts.admin title="{{ $teacher->name }}">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">{{ $teacher->name }}</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Data Guru / {{ $teacher->name }}</p>
        </div>
        <a href="{{ route('admin.teachers.index') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-white border border-bl-black text-center hover:ring-2 hover:border-transparent hover:ring-bl-blue transition-all duration-300">Kembali</div>
        </a>
    </header>

    <x-admin.card title="{{ $teacher->name }}">
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="lg:w-[300px] shrink-0">
                <img src="{{ asset($teacher->image) }}" alt="image" class="w-full rounded-[20px] object-cover">
            </div>
            <div class="flex-1">
                <div class="grid grid-cols-1 gap-4">
                    <div class="flex flex-col sm:flex-row gap-2">
                        <span class="font-semibold text-sm w-40 shrink-0">Nama</span>
                        <span class="text-sm text-bl-secondary">{{ $teacher->name }}</span>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2">
                        <span class="font-semibold text-sm w-40 shrink-0">Jenis Kelamin</span>
                        <span class="text-sm text-bl-secondary">{{ $teacher->gender }}</span>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2">
                        <span class="font-semibold text-sm w-40 shrink-0">Jabatan</span>
                        <span class="text-sm text-bl-secondary">{{ $teacher->position }}</span>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2">
                        <span class="font-semibold text-sm w-40 shrink-0">NIP</span>
                        <span class="text-sm text-bl-secondary">{{ $teacher->nip }}</span>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2">
                        <span class="font-semibold text-sm w-40 shrink-0">Tempat Lahir</span>
                        <span class="text-sm text-bl-secondary">{{ $teacher->birthplace }}</span>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2">
                        <span class="font-semibold text-sm w-40 shrink-0">Tanggal Lahir</span>
                        <span class="text-sm text-bl-secondary">{{ $teacher->birthdate }}</span>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2">
                        <span class="font-semibold text-sm w-40 shrink-0">Nomor Telepon</span>
                        <span class="text-sm text-bl-secondary">{{ $teacher->phone }}</span>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2">
                        <span class="font-semibold text-sm w-40 shrink-0">Alamat</span>
                        <span class="text-sm text-bl-secondary">{{ $teacher->address }}</span>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2">
                        <span class="font-semibold text-sm w-40 shrink-0">Status</span>
                        <span>
                            @if ($teacher->status == 'Aktif')
                                <span class="rounded-full px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold">{{ $teacher->status }}</span>
                            @else
                                <span class="rounded-full px-3 py-1 bg-red-100 text-red-700 text-xs font-semibold">{{ $teacher->status }}</span>
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </x-admin.card>
</x-layouts.admin>
