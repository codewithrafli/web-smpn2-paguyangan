<x-layouts.admin title="Tambah Guru">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Tambah Guru</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Data Guru Dan Karyawan / Create</p>
        </div>
        <a href="{{ route('admin.teachers.index') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-white border border-bl-black text-center hover:ring-2 hover:border-transparent hover:ring-bl-blue transition-all duration-300">Kembali</div>
        </a>
    </header>
    <x-admin.card title="Tambah Guru">
        <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-input.text label="Nama " name="name" />
            <x-input.select label="Jenis Kelamin" name="gender">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </x-input.select>
            <x-input.text label="Jabatan " name="position" />
            <x-input.text label="NIP " name="nip" />
            <x-input.text label="Tempat Lahir " name="birthplace" />
            <x-input.date label="Tanggal Lahir " name="birthdate" />
            <x-input.text label="Nomor Handhphone " name="phone" />
            <x-input.textarea label="Alamat " name="address" />
            <x-input.file label="Foto " name="image" />
            <x-input.select label="Status " name="status">
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </x-input.select>
            <div class="flex justify-end mt-6">
                <x-button.primary type="submit">Simpan</x-button.primary>
            </div>
        </form>
    </x-admin.card>
</x-layouts.admin>
