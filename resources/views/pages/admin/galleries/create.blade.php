<x-layouts.admin title="Tambah Gallery">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Tambah Gallery</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Manajemen Website > Gallery > Create</p>
        </div>
        <a href="{{ route('admin.galleries.index') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-white border border-bl-black text-center hover:ring-2 hover:border-transparent hover:ring-bl-blue transition-all duration-300">Kembali</div>
        </a>
    </header>

    <x-admin.card title="Tambah Gallery">
        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-input.text label="Judul" name="title" />
            <x-input.textarea label="Deskripsi" name="description" />
            <x-input.file label="Gambar" name="image" />

            <div class="flex justify-end mt-6">
                <x-button.primary type="submit">
                    Simpan
                </x-button.primary>
            </div>
        </form>
    </x-admin.card>
</x-layouts.admin>
