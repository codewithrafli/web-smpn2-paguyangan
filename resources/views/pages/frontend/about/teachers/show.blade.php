<x-layouts.frontend title="{{ $teacher->name }}">
    <x-frontend.header>
        <x-slot name="title">{{ $teacher->name }}</x-slot>
        <x-slot name="description">{{ $teacher->position }}</x-slot>
    </x-frontend.header>

    <div class="w-full max-w-[1130px] mx-auto px-4 mt-[50px] mb-[100px]">
        <div class="flex flex-col lg:flex-row gap-[30px]">
            <div class="lg:w-[300px] shrink-0">
                <img src="{{ asset($teacher->image) }}" class="w-full rounded-[30px] object-cover" alt="{{ $teacher->name }}">
            </div>
            <div class="flex-1 flex flex-col gap-[20px]">
                <div class="rounded-3xl bg-white border border-bl-border p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-bl-secondary text-sm mb-1">Nama</p>
                            <p class="font-semibold">{{ $teacher->name }}</p>
                        </div>
                        <div>
                            <p class="text-bl-secondary text-sm mb-1">NIP</p>
                            <p class="font-semibold">{{ $teacher->nip }}</p>
                        </div>
                        <div>
                            <p class="text-bl-secondary text-sm mb-1">Tempat, Tanggal Lahir</p>
                            <p class="font-semibold">{{ $teacher->birthplace }}, {{ $teacher->birthdate }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.frontend>
