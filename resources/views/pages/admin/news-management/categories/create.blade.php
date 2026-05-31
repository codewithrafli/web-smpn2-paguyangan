<x-layouts.admin title="Tambah Katagori Berita">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Tambah Kategori Berita</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Manajemen Berita / Kategori / Create</p>
        </div>
        <a href="{{ route('admin.news-categories.index') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-white border border-bl-black text-center hover:ring-2 hover:border-transparent hover:ring-bl-blue transition-all duration-300">Kembali</div>
        </a>
    </header>
    <x-admin.card title="Tambah Data">
        <form action="{{ route('admin.news-categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-input.text label="Title " name="title" id="title" />
            <x-input.text label="Slug " name="slug" id="slug" />
            <x-input.textarea label="Description " name="description" />
            <div class="flex justify-end mt-6">
                <x-button.primary type="submit">Simpan</x-button.primary>
            </div>
        </form>
    </x-admin.card>

    @push('custom-scripts')
        <script>
            $(document).ready(function() {
                $('#title').keyup(function() {
                    $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g, "-"));
                });
            });
        </script>
    @endpush
</x-layouts.admin>
