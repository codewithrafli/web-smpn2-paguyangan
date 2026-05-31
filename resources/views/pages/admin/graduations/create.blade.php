<x-layouts.admin title="Tambah Kelulusan">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Tambah Kelulusan</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Pengumuman Kelulusan / Create</p>
        </div>
        <a href="{{ route('admin.graduations.index') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-white border border-bl-black text-center hover:ring-2 hover:border-transparent hover:ring-bl-blue transition-all duration-300">Kembali</div>
        </a>
    </header>

    <x-admin.card title="Tambah Data">
        <form action="{{ route('admin.graduations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-input.text label="Nama" name="name" />
            <x-input.text label="Nomor Ujian" name="test_number" />
            <x-input.select label="Status" name="status">
                <option value="passed">Lulus</option>
                <option value="failed">Tidak Lulus</option>
            </x-input.select>
            <x-input.file label="Pas Foto" name="photo" accept="image/*" />
            <x-input.file label="File SKL (PDF)" name="skl_file" accept=".pdf" />
            <x-input.file label="File Surat Keterangan Nilai (PDF)" name="skn_file" accept=".pdf" />
            <div class="flex justify-end mt-6">
                <x-button.primary type="submit">Simpan</x-button.primary>
            </div>
        </form>
    </x-admin.card>
</x-layouts.admin>
