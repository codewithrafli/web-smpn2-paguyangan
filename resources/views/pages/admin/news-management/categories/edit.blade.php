<x-layouts.admin title="Edit Kategori Berita">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Edit Kategori Berita</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Manajemen Berita / Kategori / Edit</p>
        </div>
        <a href="{{ route('admin.news-categories.index') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-white border border-bl-black text-center hover:ring-2 hover:border-transparent hover:ring-bl-blue transition-all duration-300">Kembali</div>
        </a>
    </header>
    <x-admin.card title="Edit Data Kategori Berita">
        <form action="{{ route('admin.news-categories.update', $category->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-input.text label="Title " name="title" id="title" value="{{ $category->title }}" />
            <x-input.text label="Slug " name="slug" id="slug" value="{{ $category->slug }}" />
            <x-input.textarea label="Description " name="description" value="{{ $category->description }}" />
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
