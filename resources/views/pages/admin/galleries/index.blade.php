<x-layouts.admin title="Gallery">
    @push('plugin-styles')
        <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/lightbox/css/lightbox.css') }}">
    @endpush

    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Gallery</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Manajemen Website > Gallery</p>
        </div>
        <a href="{{ route('admin.galleries.create') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-bl-blue text-white transition-all duration-300 hover:shadow-[0_8px_20px_0_#007AFF91] text-center">Tambah Gallery</div>
        </a>
    </header>

    <x-admin.card title="Data Gallery">
        <x-admin.datatable>
            <x-slot name="thead">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @foreach ($galleries as $gallery)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $gallery->title }}</td>
                        <td>{{ $gallery->description }}</td>
                        <td>
                            <a href="{{ asset($gallery->image) }}" class="block" data-lightbox="gambar"
                                data-title="{{ $gallery->description }}">
                                <img src="{{ asset($gallery->image) }}" alt="image"
                                    class="w-[100px] rounded">
                            </a>
                        </td>
                        <td>
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.galleries.edit', $gallery->id) }}"
                                    class="rounded-full py-2 px-4 bg-bl-light-orange text-white text-xs font-semibold transition-all duration-300 hover:shadow-md">Edit</a>
                                <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-full py-2 px-4 bg-bl-orange text-white text-xs font-semibold transition-all duration-300 hover:shadow-md"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-admin.datatable>
    </x-admin.card>

    @push('plugin-scripts')
        <script src="{{ asset('frontend/assets/plugins/lightbox/js/lightbox-plus-jquery.min.js') }}"></script>

        <script>
            lightbox.option({
                'resizeDuration': 200,
                'wrapAround': true
            })
        </script>
    @endpush
</x-layouts.admin>
