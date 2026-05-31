<x-layouts.admin title="Buku Tamu">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Buku Tamu</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Kelola data buku tamu</p>
        </div>
        @hasrole('admin')
            <a href="{{ route('admin.guestbooks.create') }}">
                <div class="font-semibold rounded-full py-[14px] px-5 bg-bl-blue text-white transition-all duration-300 hover:shadow-[0_8px_20px_0_#007AFF91] text-center">Tambah Tamu</div>
            </a>
        @else
            <a href="{{ route('petugas.guestbooks.create') }}">
                <div class="font-semibold rounded-full py-[14px] px-5 bg-bl-blue text-white transition-all duration-300 hover:shadow-[0_8px_20px_0_#007AFF91] text-center">Tambah Tamu</div>
            </a>
        @endhasrole
    </header>

    <x-admin.card title="Data Buku Tamu">
        <x-admin.datatable>
            <x-slot name="thead">
                <tr>
                    <th>No</th>
                    <th>Nama Tamu</th>
                    <th>Alamat</th>
                    <th>Nomer Hp</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @foreach ($guestbooks as $guestbook)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $guestbook->name }}</td>
                        <td>{{ $guestbook->address }}</td>
                        <td>{{ $guestbook->phone }}</td>
                        <td>{{ $guestbook->date->format('d F Y') }}</td>
                        <td>
                            <form action="{{ route('admin.guestbooks.destroy', $guestbook->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="rounded-full py-2 px-4 bg-bl-orange text-white text-xs font-semibold transition-all duration-300 hover:shadow-md" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-admin.datatable>
    </x-admin.card>
</x-layouts.admin>
