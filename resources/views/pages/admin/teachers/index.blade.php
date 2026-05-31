<x-layouts.admin title="Data Guru">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Data Guru</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Data Guru</p>
        </div>
        <a href="{{ route('admin.teachers.create') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-bl-blue text-white transition-all duration-300 hover:shadow-[0_8px_20px_0_#007AFF91] text-center">Tambah Guru</div>
        </a>
    </header>
    <x-admin.card title="Data Guru">
        <x-admin.datatable>
            <x-slot name="thead">
                <tr>
                    <th>No</th>
                    <th>Pas Foto</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset($teacher->image) }}" alt="image" class="img-table-lightbox">
                        </td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->nip }}</td>
                        <td>
                            @if ($teacher->status == 'Aktif')
                                <span class="rounded-full px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold">{{ $teacher->status }}</span>
                            @else
                                <span class="rounded-full px-3 py-1 bg-red-100 text-red-700 text-xs font-semibold">{{ $teacher->status }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.teachers.edit', $teacher->id) }}"
                                class="rounded-full py-2 px-4 bg-bl-light-orange text-white text-xs font-semibold transition-all duration-300 hover:shadow-md">Edit</a>
                            <a href="{{ route('admin.teachers.show', $teacher->id) }}"
                                class="rounded-full py-2 px-4 bg-bl-blue text-white text-xs font-semibold transition-all duration-300 hover:shadow-md">Detail</a>
                            <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="rounded-full py-2 px-4 bg-bl-orange text-white text-xs font-semibold transition-all duration-300 hover:shadow-md"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-admin.datatable>
    </x-admin.card>
</x-layouts.admin>
