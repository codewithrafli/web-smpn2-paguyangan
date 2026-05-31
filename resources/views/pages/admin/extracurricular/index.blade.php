<x-layouts.admin title="Data Ekstrakulikuler">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Data Ekstrakulikuler</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Ekstrakulikuler</p>
        </div>
        <a href="{{ route('admin.extracurriculars.create') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-bl-blue text-white transition-all duration-300 hover:shadow-[0_8px_20px_0_#007AFF91] text-center">Tambah Ekstrakulikuler</div>
        </a>
    </header>

    <x-admin.card title="Data Ekstrakulikuler">
        <x-admin.datatable>
            <x-slot name="thead">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Pembimbing</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @foreach ($extracurriculars as $extracurricular)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $extracurricular->name }}</td>
                        <td>{{ $extracurricular->description }}</td>
                        <td>
                            <img src="{{ $extracurricular->image_url }}" alt="{{ $extracurricular->name }}"
                                class="w-[100px] rounded">
                        </td>
                        <td>{{ $extracurricular->teacher->name }}</td>
                        <td>
                            @if ($extracurricular->status == 'active')
                                <span class="rounded-full px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold">Aktif</span>
                            @else
                                <span class="rounded-full px-3 py-1 bg-red-100 text-red-700 text-xs font-semibold">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.extracurriculars.edit', $extracurricular->id) }}"
                                    class="rounded-full py-2 px-4 bg-bl-light-orange text-white text-xs font-semibold transition-all duration-300 hover:shadow-md">Edit</a>
                                <form action="{{ route('admin.extracurriculars.destroy', $extracurricular->id) }}"
                                    method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="rounded-full py-2 px-4 bg-bl-orange text-white text-xs font-semibold transition-all duration-300 hover:shadow-md"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-admin.datatable>
    </x-admin.card>
</x-layouts.admin>
