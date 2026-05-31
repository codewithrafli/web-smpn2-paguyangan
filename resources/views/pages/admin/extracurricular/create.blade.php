<x-layouts.admin title="Tambah Ekstrakulikuler">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Tambah Ekstrakulikuler</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Ekstrakulikuler > Create</p>
        </div>
        <a href="{{ route('admin.extracurriculars.index') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-white border border-bl-black text-center hover:ring-2 hover:border-transparent hover:ring-bl-blue transition-all duration-300">Kembali</div>
        </a>
    </header>

    <x-admin.card title="Tambah Ekstrakulikuler">
        <form action="{{ route('admin.extracurriculars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-input.text label="Nama Ekstrakulikuler" name="name" />
            <x-input.textarea label="Deskripsi" name="description" />
            <x-input.select label="Pembimbing" name="teacher_id">
                <option value="">-- Pilih Pembimbing --</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </x-input.select>
            <x-input.file label="Gambar" name="image" />
            <x-input.select label="Status" name="status">
                <option value="">-- Pilih Status --</option>
                <option value="active">Aktif</option>
                <option value="inactive">Tidak Aktif</option>
            </x-input.select>

            <div class="flex justify-end mt-6">
                <x-button.primary type="submit">
                    Simpan
                </x-button.primary>
            </div>
        </form>
    </x-admin.card>
</x-layouts.admin>
