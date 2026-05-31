<x-layouts.admin title="Tambah Siswa">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Tambah Siswa</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Data Siswa / Create</p>
        </div>
        <a href="{{ route('admin.students.index') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-white border border-bl-black text-center hover:ring-2 hover:border-transparent hover:ring-bl-blue transition-all duration-300">Kembali</div>
        </a>
    </header>

    <x-admin.card title="Tambah Siswa">
        <form action="{{ route('admin.students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-input.text label="Nama" name="name" />
            <x-input.text label="Kelas" name="class" />
            <x-input.select label="Status " name="status">
                <option value="active">Masih Aktif</option>
                <option value="inactive">Sudah Lulus</option>
            </x-input.select>
            <div class="flex justify-end mt-6">
                <x-button.primary type="submit">Simpan</x-button.primary>
            </div>
        </form>
    </x-admin.card>
</x-layouts.admin>
