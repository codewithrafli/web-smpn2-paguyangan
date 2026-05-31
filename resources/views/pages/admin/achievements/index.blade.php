<x-layouts.admin title="Prestasi">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Prestasi</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Manajemen Website > Prestasi</p>
        </div>
        <a href="{{ route('admin.achievements.create') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-bl-blue text-white transition-all duration-300 hover:shadow-[0_8px_20px_0_#007AFF91] text-center">Tambah Prestasi</div>
        </a>
    </header>

    <x-admin.card title="Data Prestasi">
        <x-admin.datatable>
            <x-slot name="thead">
                <tr>
                    <th>No</th>
                    <th>Nama Peserta</th>
                    <th>Prestasi</th>
                    <th>Tingkat</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @foreach ($achievements as $achievement)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $achievement->name }}</td>
                        <td>{{ $achievement->achievement }}</td>
                        <td>{{ $achievement->level }}</td>
                        <td>{{ $achievement->year }}</td>
                        <td>
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.achievements.edit', $achievement->id) }}"
                                    class="rounded-full py-2 px-4 bg-bl-light-orange text-white text-xs font-semibold transition-all duration-300 hover:shadow-md">Edit</a>
                                <form action="{{ route('admin.achievements.destroy', $achievement->id) }}"
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
