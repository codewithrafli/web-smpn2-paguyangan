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
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="col-span-1">
                <img src="{{ asset($teacher->image) }}" alt="image" class="w-full rounded-lg">
            </div>
            <div class="col-span-1 md:col-span-2">
                <div class="grid grid-cols-1 gap-4">
                    <div class="flex border-b border-gray-200 pb-3">
                        <span class="font-semibold w-40 text-gray-600">Nama</span>
                        <span>{{ $teacher->name }}</span>
                    </div>
                    <div class="flex border-b border-gray-200 pb-3">
                        <span class="font-semibold w-40 text-gray-600">Jenis Kelamin</span>
                        <span>{{ $teacher->gender }}</span>
                    </div>
                    <div class="flex border-b border-gray-200 pb-3">
                        <span class="font-semibold w-40 text-gray-600">Jabatan</span>
                        <span>{{ $teacher->position }}</span>
                    </div>
                    <div class="flex border-b border-gray-200 pb-3">
                        <span class="font-semibold w-40 text-gray-600">NIP</span>
                        <span>{{ $teacher->nip }}</span>
                    </div>
                    <div class="flex border-b border-gray-200 pb-3">
                        <span class="font-semibold w-40 text-gray-600">Tempat Lahir</span>
                        <span>{{ $teacher->birthplace }}</span>
                    </div>
                    <div class="flex border-b border-gray-200 pb-3">
                        <span class="font-semibold w-40 text-gray-600">Tanggal Lahir</span>
                        <span>{{ $teacher->birthdate }}</span>
                    </div>
                    <div class="flex border-b border-gray-200 pb-3">
                        <span class="font-semibold w-40 text-gray-600">Nomor Telepon</span>
                        <span>{{ $teacher->phone }}</span>
                    </div>
                    <div class="flex border-b border-gray-200 pb-3">
                        <span class="font-semibold w-40 text-gray-600">Alamat</span>
                        <span>{{ $teacher->address }}</span>
                    </div>
                    <div class="flex border-b border-gray-200 pb-3">
                        <span class="font-semibold w-40 text-gray-600">Status</span>
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
