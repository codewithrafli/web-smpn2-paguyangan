<x-layouts.admin title="Kelulusan">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Pengumuman Kelulusan</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Kelola data kelulusan siswa</p>
        </div>
        <div class="flex items-center gap-3">
            <button onclick="document.getElementById('import-section').classList.toggle('hidden')" class="font-semibold rounded-full py-[14px] px-5 bg-green-600 text-white transition-all duration-300 hover:shadow-[0_8px_20px_0_#16a34a91] text-center">Import Excel</button>
            <a href="{{ route('admin.graduations.create') }}">
                <div class="font-semibold rounded-full py-[14px] px-5 bg-bl-blue text-white transition-all duration-300 hover:shadow-[0_8px_20px_0_#007AFF91] text-center">Tambah Data</div>
            </a>
        </div>
    </header>

    <div id="import-section" class="hidden bg-white rounded-[20px] p-6 shadow-sm mb-6">
        <h3 class="text-lg font-semibold mb-4">Import Data Kelulusan dari Excel</h3>
        <form action="{{ route('admin.graduations.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col sm:flex-row items-start sm:items-end gap-4">
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">File Excel (.xlsx / .xls)</label>
                    <input type="file" name="file" accept=".xlsx,.xls" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" required>
                    @error('file')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="font-semibold rounded-full py-[10px] px-5 bg-green-600 text-white transition-all duration-300 hover:shadow-md text-sm">Upload & Import</button>
            </div>
            <div class="mt-3">
                <a href="{{ asset('templates/template-import-kelulusan.xlsx') }}" class="text-sm text-green-600 hover:underline">Download Template Excel</a>
            </div>
        </form>
    </div>

    @php
        $totalSiswa = $graduations->count();
        $totalLulus = $graduations->where('status', 'passed')->count();
        $totalTidakLulus = $graduations->where('status', 'failed')->count();
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-[20px] p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-bl-secondary mb-1">Total Siswa</p>
                    <h4 class="text-2xl font-bold">{{ $totalSiswa }}</h4>
                </div>
                <div class="bg-blue-50 rounded-lg p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-bl-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-[20px] p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-bl-secondary mb-1">Lulus</p>
                    <h4 class="text-2xl font-bold text-green-600">{{ $totalLulus }}</h4>
                </div>
                <div class="bg-green-50 rounded-lg p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-[20px] p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-bl-secondary mb-1">Tidak Lulus</p>
                    <h4 class="text-2xl font-bold text-red-600">{{ $totalTidakLulus }}</h4>
                </div>
                <div class="bg-red-50 rounded-lg p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
        </div>
    </div>

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
                                <img src="{{ asset('storage/' . $graduation->photo) }}" alt="Foto" class="w-10 h-10 rounded-lg object-cover">
                            @else
                                <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                            @endif
                        </td>
                        <td>{{ $graduation->name }}</td>
                        <td><code class="text-sm bg-gray-100 px-2 py-1 rounded">{{ $graduation->test_number }}</code></td>
                        <td>
                            @if ($graduation->status == 'passed')
                                <span class="rounded-full px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold">Lulus</span>
                            @else
                                <span class="rounded-full px-3 py-1 bg-red-100 text-red-700 text-xs font-semibold">Tidak Lulus</span>
                            @endif
                        </td>
                        <td>
                            @if ($graduation->skl_file)
                                <a href="{{ asset('storage/' . $graduation->skl_file) }}" target="_blank" class="rounded-full px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold hover:bg-blue-200 transition-colors">SKL</a>
                            @endif
                            @if ($graduation->skn_file)
                                <a href="{{ asset('storage/' . $graduation->skn_file) }}" target="_blank" class="rounded-full px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold hover:bg-blue-200 transition-colors">SKN</a>
                            @endif
                            @if (!$graduation->skl_file && !$graduation->skn_file)
                                <span class="text-bl-secondary">-</span>
                            @endif
                        </td>
                        <td>
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.graduations.edit', $graduation->id) }}" class="rounded-full py-2 px-4 bg-bl-light-orange text-white text-xs font-semibold transition-all duration-300 hover:shadow-md">Edit</a>
                                <form action="{{ route('admin.graduations.destroy', $graduation->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="rounded-full py-2 px-4 bg-bl-orange text-white text-xs font-semibold transition-all duration-300 hover:shadow-md" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-slot>
        </x-admin.datatable>
    </x-admin.card>
</x-layouts.admin>
