<x-layouts.admin title="Banner">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Banner</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Manajemen Website / Banner</p>
        </div>
        <a href="{{ route('admin.banners.create') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-bl-blue text-white transition-all duration-300 hover:shadow-[0_8px_20px_0_#007AFF91] text-center">Tambah Banner</div>
        </a>
    </header>
    <x-admin.card title="Data Banner">
        <x-admin.datatable>
            <x-slot name="thead">
                <tr>
                    <th>No</th>
                    <th>Desktop Image</th>
                    <th>Mobile Image</th>
                    <th>Aksi</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @foreach ($banners as $banner)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset($banner->desktop_image) }}" alt="image" class="table-image">
                        </td>
                        <td>
                            <img src="{{ asset($banner->mobile_image) }}" alt="image" class="table-image">
                        </td>
                        <td>
                            <a href="{{ route('admin.banners.edit', $banner->id) }}"
                                class="rounded-full py-2 px-4 bg-bl-light-orange text-white text-xs font-semibold transition-all duration-300 hover:shadow-md">Edit</a>
                            <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="rounded-full py-2 px-4 bg-bl-orange text-white text-xs font-semibold transition-all duration-300 hover:shadow-md"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-admin.datatable>
    </x-admin.card>
</x-layouts.admin>
