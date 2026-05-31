<x-layouts.admin title="Kelulusan">
    <div class="d-flex align-items-center justify-content-between">
        <nav class="page-breadcrumb mb-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pengumuman Kelulusan</a></li>
            </ol>
        </nav>
        <a href="{{ route('admin.graduations.create') }}" class="btn btn-primary btn-sm ml-auto mb-3">
            <i data-feather="plus" class="icon-sm me-1"></i> Tambah Data
        </a>
    </div>

    @php
        $totalSiswa = $graduations->count();
        $totalLulus = $graduations->where('status', 'passed')->count();
        $totalTidakLulus = $graduations->where('status', 'failed')->count();
    @endphp

    <div class="row mb-3">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Total Siswa</p>
                            <h4 class="mb-0">{{ $totalSiswa }}</h4>
                        </div>
                        <div class="bg-primary bg-opacity-10 rounded p-2">
                            <i data-feather="users" class="icon-lg text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Lulus</p>
                            <h4 class="mb-0 text-success">{{ $totalLulus }}</h4>
                        </div>
                        <div class="bg-success bg-opacity-10 rounded p-2">
                            <i data-feather="check-circle" class="icon-lg text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Tidak Lulus</p>
                            <h4 class="mb-0 text-danger">{{ $totalTidakLulus }}</h4>
                        </div>
                        <div class="bg-danger bg-opacity-10 rounded p-2">
                            <i data-feather="x-circle" class="icon-lg text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-admin.card title="Data Kelulusan">
                <x-admin.datatable>
                    <x-slot name="thead">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Nomor Ujian</th>
                            <th>Status</th>
                            <th>Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($graduations as $graduation)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($graduation->photo)
                                        <img src="{{ asset('storage/' . $graduation->photo) }}" alt="Foto" class="rounded" style="width: 40px; height: 40px; object-fit: cover;">
                                    @else
                                        <div class="rounded bg-light d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            <i data-feather="user" class="icon-sm text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>{{ $graduation->name }}</td>
                                <td><code>{{ $graduation->test_number }}</code></td>
                                <td>
                                    @if ($graduation->status == 'passed')
                                        <span class="badge bg-success rounded-pill px-3">Lulus</span>
                                    @else
                                        <span class="badge bg-danger rounded-pill px-3">Tidak Lulus</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($graduation->skl_file)
                                        <a href="{{ asset('storage/' . $graduation->skl_file) }}" target="_blank" class="badge bg-info text-white me-1" title="SKL">SKL</a>
                                    @endif
                                    @if ($graduation->skn_file)
                                        <a href="{{ asset('storage/' . $graduation->skn_file) }}" target="_blank" class="badge bg-info text-white" title="SKN">SKN</a>
                                    @endif
                                    @if (!$graduation->skl_file && !$graduation->skn_file)
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.graduations.edit', $graduation->id) }}"
                                        class="btn btn-warning btn-icon btn-sm me-1" title="Edit">
                                        <i data-feather="edit" class="icon-sm"></i>
                                    </a>
                                    <form action="{{ route('admin.graduations.destroy', $graduation->id) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-icon btn-sm" title="Hapus"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                            <i data-feather="trash-2" class="icon-sm"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-admin.datatable>
            </x-admin.card>
        </div>
    </div>
</x-layouts.admin>
