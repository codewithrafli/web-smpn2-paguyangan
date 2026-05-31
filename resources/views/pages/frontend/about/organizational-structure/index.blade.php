<x-layouts.frontend title="Struktur Organisasi">
    <x-frontend.header>
        <x-slot name="title">Struktur Organisasi</x-slot>
        <x-slot name="description">Struktur Organisasi {{ getWebConfiguration()->name }}</x-slot>
    </x-frontend.header>

    <div class="w-full max-w-[1130px] mx-auto px-4 mt-[50px] mb-[100px] flex justify-center">
        <div class="rounded-3xl bg-white border border-bl-border p-6 inline-block">
            <img src="{{ asset(getWebConfiguration()->organization_structure) }}" class="max-w-full h-auto" alt="Struktur Organisasi">
        </div>
    </div>
</x-layouts.frontend>
