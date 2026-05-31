<x-layouts.admin title="Tambah Kelulusan">


    <div class="d-flex align-items-center justify-content-between">
        <nav class="page-breadcrumb mb-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pengumuman Kelulusan</a></li>
                <li class="breadcrumb-item active">Create</li>

            </ol>
        </nav>
        <a href="{{ route('admin.graduations.index') }}" class="btn btn-danger btn-sm ml-auto mb-3">Kembali</a>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
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
                    <x-button.primary class="float-end" type="submit">
                        Simpan
                    </x-button.primary>
                </form>
            </x-admin.card>
        </div>
    </div>


</x-layouts.admin>
