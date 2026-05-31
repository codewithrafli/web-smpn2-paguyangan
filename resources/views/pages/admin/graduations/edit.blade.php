<x-layouts.admin title="Edit Kelulusan">


    <div class="d-flex align-items-center justify-content-between">
        <nav class="page-breadcrumb mb-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pengumuman Kelulusan</a></li>
                <li class="breadcrumb-item"><a href="#">{{ $graduation->name }}</a></li>
                <li class="breadcrumb-item active">Edit</li>

            </ol>
        </nav>
        <a href="{{ route('admin.graduations.index') }}" class="btn btn-danger btn-sm ml-auto mb-3">Kembali</a>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-admin.card title="Edit Data">
                <form action="{{ route('admin.graduations.update', $graduation->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-input.text label="Nama" name="name" value="{{ $graduation->name }}" />
                    <x-input.text label="Nomor Ujian" name="test_number" value="{{ $graduation->test_number }}" />
                    <x-input.select label="Status" name="status">
                        <option value="passed" {{ $graduation->status == 'passed' ? 'selected' : '' }}>Lulus</option>
                        <option value="failed" {{ $graduation->status == 'failed' ? 'selected' : '' }}>Tidak Lulus</option>
                    </x-input.select>

                    <div class="mb-3">
                        <label class="form-label">Pas Foto</label>
                        @if ($graduation->photo)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $graduation->photo) }}" alt="Foto" class="rounded" style="height: 100px;">
                            </div>
                        @endif
                        <input type="file" name="photo" class="form-control" accept="image/*">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">File SKL (PDF)</label>
                        @if ($graduation->skl_file)
                            <div class="mb-2">
                                <a href="{{ asset('storage/' . $graduation->skl_file) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                    <i data-feather="file-text" class="icon-sm me-1"></i> Lihat SKL
                                </a>
                            </div>
                        @endif
                        <input type="file" name="skl_file" class="form-control" accept=".pdf">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah file</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">File Surat Keterangan Nilai (PDF)</label>
                        @if ($graduation->skn_file)
                            <div class="mb-2">
                                <a href="{{ asset('storage/' . $graduation->skn_file) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                    <i data-feather="file-text" class="icon-sm me-1"></i> Lihat Surat Keterangan Nilai
                                </a>
                            </div>
                        @endif
                        <input type="file" name="skn_file" class="form-control" accept=".pdf">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah file</small>
                    </div>

                    <x-button.primary class="float-end" type="submit">
                        Update
                    </x-button.primary>
                </form>
            </x-admin.card>
        </div>
    </div>


</x-layouts.admin>
