<x-layouts.admin title="Data Siswa">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Data Siswa</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Kelola data siswa</p>
        </div>
        <a href="{{ route('admin.students.create') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-bl-blue text-white transition-all duration-300 hover:shadow-[0_8px_20px_0_#007AFF91] text-center">Tambah Siswa</div>
        </a>
    </header>

    <x-admin.card title="Data Siswa">
        <x-admin.datatable>
            <x-slot name="thead">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->class }}</td>
                        <td>
                            @if ($student->status == 'active')
                                <span class="rounded-full px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold">Masih Aktif</span>
                            @else
                                <span class="rounded-full px-3 py-1 bg-red-100 text-red-700 text-xs font-semibold">Sudah Lulus</span>
                            @endif
                        </td>
                        <td>
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.students.edit', $student->id) }}" class="rounded-full py-2 px-4 bg-bl-light-orange text-white text-xs font-semibold transition-all duration-300 hover:shadow-md">Edit</a>
                                <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="rounded-full py-2 px-4 bg-bl-orange text-white text-xs font-semibold transition-all duration-300 hover:shadow-md" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-admin.datatable>
    </x-admin.card>
</x-layouts.admin>
