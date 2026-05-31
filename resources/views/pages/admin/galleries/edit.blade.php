<x-layouts.admin title="Edit Gallery">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Edit Gallery</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Manajemen Website > Gallery > Edit</p>
        </div>
        <a href="{{ route('admin.galleries.index') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-white border border-bl-black text-center hover:ring-2 hover:border-transparent hover:ring-bl-blue transition-all duration-300">Kembali</div>
        </a>
    </header>

    <x-admin.card title="Edit Gallery">
        <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-input.text label="Judul" name="title" :value="$gallery->title" />
            <x-input.textarea label="Deskripsi" name="description" :value="$gallery->description" />
            @if ($gallery->image)
                <div class="mb-4">
                    <p class="text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</p>
                    <img src="{{ asset($gallery->image) }}" alt="gallery image" class="w-[200px] rounded">
                </div>
            @endif
            <x-input.file label="Gambar" name="image" />

            <div class="flex justify-end mt-6">
                <x-button.primary type="submit">
                    Update
                </x-button.primary>
            </div>
        </form>
    </x-admin.card>
</x-layouts.admin>
