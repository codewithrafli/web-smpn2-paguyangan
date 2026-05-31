<x-layouts.admin title="Tambah Berita">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Tambah Berita</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Manajemen Berita / Berita / Create</p>
        </div>
        <a href="{{ route('admin.news.index') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-white border border-bl-black text-center hover:ring-2 hover:border-transparent hover:ring-bl-blue transition-all duration-300">Kembali</div>
        </a>
    </header>
    <x-admin.card title="Tambah Data Berita">
        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-input.select label="Kategori" name="news_category_id" id="news_category_id">
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </x-input.select>
            <x-input.text label="Judul" name="title" id="title" />
            <x-input.text label="Slug" name="slug" id="slug" />
            <x-input.mde label="Konten" name="content" id="content" />
            <x-input.file label="Thumbnail" name="thumbnail" id="thumbnail" />
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
