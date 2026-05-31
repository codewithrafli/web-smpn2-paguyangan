<x-layouts.admin title="Tambah Tamu">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Tambah Tamu</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Buku Tamu / Create</p>
        </div>
        @hasrole('admin')
            <a href="{{ route('admin.guestbooks.index') }}">
                <div class="font-semibold rounded-full py-[14px] px-5 bg-white border border-bl-black text-center hover:ring-2 hover:border-transparent hover:ring-bl-blue transition-all duration-300">Kembali</div>
            </a>
        @else
            <a href="{{ route('petugas.guestbooks.index') }}">
                <div class="font-semibold rounded-full py-[14px] px-5 bg-white border border-bl-black text-center hover:ring-2 hover:border-transparent hover:ring-bl-blue transition-all duration-300">Kembali</div>
            </a>
        @endhasrole
    </header>

    <x-admin.card title="Tambah Tamu">
        <form action="@hasrole('admin'){{ route('admin.guestbooks.store') }}@else{{ route('petugas.guestbooks.store') }}@endhasrole" method="POST" enctype="multipart/form-data">
            @csrf
            <x-input.text label="Nama Tamu" name="name" />
            <x-input.textarea label="Alamat" name="address" />
            <x-input.text label="Nomer Hp" name="phone" />
            <x-input.date label="Tanggal" name="date" />
            <div class="flex justify-end mt-6">
                <x-button.primary type="submit">Simpan</x-button.primary>
            </div>
        </form>
    </x-admin.card>
</x-layouts.admin>
