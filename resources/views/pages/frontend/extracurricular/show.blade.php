<x-layouts.frontend title="{{ $extracurricular->name }}">
    <x-frontend.header>
        <x-slot name="title">{{ $extracurricular->name }}</x-slot>
        <x-slot name="description">
            <a href="{{ route('extracurricular') }}" class="text-bl-blue hover:underline">Ekstrakurikuler</a> / {{ $extracurricular->name }}
        </x-slot>
    </x-frontend.header>

    <div class="w-full max-w-[1130px] mx-auto px-4 mt-[50px] mb-[100px]">
        <div class="flex flex-col lg:flex-row gap-[30px]">
            <div class="lg:w-[400px] shrink-0">
                <img src="{{ asset($extracurricular->image_url) }}" class="w-full rounded-[30px] object-cover" alt="{{ $extracurricular->name }}">
            </div>
            <div class="flex-1 flex flex-col gap-[20px]">
                <div class="rounded-3xl bg-white border border-bl-border p-6">
                    <h3 class="font-bold text-lg mb-2">Nama</h3>
                    <p class="text-bl-secondary">{{ $extracurricular->name }}</p>
                </div>
                <div class="rounded-3xl bg-white border border-bl-border p-6">
                    <h3 class="font-bold text-lg mb-2">Deskripsi</h3>
                    <p class="text-bl-secondary leading-[28px]">{{ $extracurricular->description }}</p>
                </div>
                <div class="rounded-3xl bg-white border border-bl-border p-6">
                    <h3 class="font-bold text-lg mb-2">Pembimbing</h3>
                    <p class="text-bl-secondary">{{ $extracurricular->teacher->name }}</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.frontend>
