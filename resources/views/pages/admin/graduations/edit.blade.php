<x-layouts.admin title="Edit Kelulusan">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Edit Kelulusan</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Pengumuman Kelulusan / {{ $graduation->name }} / Edit</p>
        </div>
        <a href="{{ route('admin.graduations.index') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-white border border-bl-black text-center hover:ring-2 hover:border-transparent hover:ring-bl-blue transition-all duration-300">Kembali</div>
        </a>
    </header>

    <x-admin.card title="Edit Data">
        <form action="{{ route('admin.graduations.update', $graduation->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-input.text label="Nama" name="name" value="{{ $graduation->name }}" />
            <x-input.text label="Nomor Ujian" name="test_number" value="{{ $graduation->test_number }}" />
            <x-input.select label="Status" name="status">
                <option value="passed" {{ $graduation->status == 'passed' ? 'selected' : '' }}>Lulus</option>
                <option value="failed" {{ $graduation->status == 'failed' ? 'selected' : '' }}>Tidak Lulus</option>
            </x-input.select>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Pas Foto</label>
                @if ($graduation->photo)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $graduation->photo) }}" alt="Foto" class="h-24 rounded-lg object-cover">
                    </div>
                @endif
                <input type="file" name="photo" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-bl-blue hover:file:bg-blue-100" accept="image/*">
                <p class="mt-1 text-sm text-bl-secondary">Kosongkan jika tidak ingin mengubah foto</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">File SKL (PDF)</label>
                @if ($graduation->skl_file)
                    <div class="mb-3">
                        <a href="{{ asset('storage/' . $graduation->skl_file) }}" target="_blank" class="inline-flex items-center gap-2 rounded-full py-2 px-4 bg-blue-50 text-bl-blue text-sm font-semibold hover:bg-blue-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Lihat SKL
                        </a>
                    </div>
                @endif
                <input type="file" name="skl_file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-bl-blue hover:file:bg-blue-100" accept=".pdf">
                <p class="mt-1 text-sm text-bl-secondary">Kosongkan jika tidak ingin mengubah file</p>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">File Surat Keterangan Nilai (PDF)</label>
                @if ($graduation->skn_file)
                    <div class="mb-3">
                        <a href="{{ asset('storage/' . $graduation->skn_file) }}" target="_blank" class="inline-flex items-center gap-2 rounded-full py-2 px-4 bg-blue-50 text-bl-blue text-sm font-semibold hover:bg-blue-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Lihat Surat Keterangan Nilai
                        </a>
                    </div>
                @endif
                <input type="file" name="skn_file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-bl-blue hover:file:bg-blue-100" accept=".pdf">
                <p class="mt-1 text-sm text-bl-secondary">Kosongkan jika tidak ingin mengubah file</p>
            </div>

            <div class="flex justify-end mt-6">
                <x-button.primary type="submit">Update</x-button.primary>
            </div>
        </form>
    </x-admin.card>
</x-layouts.admin>
