<x-layouts.admin title="Edit Prestasi">
    <header class="flex items-center justify-between">
        <div class="flex flex-col gap-[6px]">
            <h1 class="text-[26px] font-bold leading-[39px]">Edit Prestasi</h1>
            <p class="text-sm leading-[21px] text-bl-secondary">Manajemen Website > Prestasi > Edit</p>
        </div>
        <a href="{{ route('admin.achievements.index') }}">
            <div class="font-semibold rounded-full py-[14px] px-5 bg-white border border-bl-black text-center hover:ring-2 hover:border-transparent hover:ring-bl-blue transition-all duration-300">Kembali</div>
        </a>
    </header>

    <x-admin.card title="Edit Prestasi">
        <form action="{{ route('admin.achievements.update', $achievement->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-input.text label="Nama Peserta" name="name" :value="$achievement->name" />
            <x-input.text label="Prestasi" name="achievement" :value="$achievement->achievement" />
            <x-input.text label="Tingkat" name="level" :value="$achievement->level" />
            <x-input.text label="Tahun" name="year" :value="$achievement->year" />

            <div class="flex justify-end mt-6">
                <x-button.primary type="submit">
                    Update
                </x-button.primary>
            </div>
        </form>
    </x-admin.card>
</x-layouts.admin>
