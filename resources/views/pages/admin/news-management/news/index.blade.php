<x-layouts.admin title="Katagori Berita">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Berita</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Manajemen Berita / Berita</p>
        </div>
        <a href="{{ route('admin.news.create') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-bl-blue text-white transition-all duration-300 hover:shadow-[0_8px_20px_0_#007AFF91] text-center">Tambah Berita</div>
        </a>
    </header>
    <x-admin.card title="Data Berita">
        <x-admin.datatable>
            <x-slot name="thead">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Thumbnail</th>
                    <th>Status</th>
                    <th>Tanggal Publish</th>
                    <th>Aksi</th>
                </tr>
            </x-slot>
            <x-slot name="tbody">
                @foreach ($news as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>
                            <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}" class="w-[100px] rounded">
                        </td>
                        <td>
                            @if ($item->is_published)
                                <span class="rounded-full px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold">Published</span>
                            @else
                                <span class="rounded-full px-3 py-1 bg-red-100 text-red-700 text-xs font-semibold">Draft</span>
                            @endif
                        </td>
                        <td>{{ $item->published_at }}</td>
                        <td>
                            <a href="{{ route('admin.news.edit', $item->id) }}"
                                class="rounded-full py-2 px-4 bg-bl-light-orange text-white text-xs font-semibold transition-all duration-300 hover:shadow-md">Edit</a>
                            <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST"
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
