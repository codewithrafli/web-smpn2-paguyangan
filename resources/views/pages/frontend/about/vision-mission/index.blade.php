<x-layouts.frontend title="Visi Misi">
    <x-frontend.header>
        <x-slot name="title">Visi Misi</x-slot>
        <x-slot name="description">Visi Misi {{ getWebConfiguration()->name }}</x-slot>
    </x-frontend.header>

    <div class="w-full max-w-[850px] mx-auto px-4 mt-[50px] mb-[100px]">
        <div class="rounded-3xl bg-white border border-bl-border p-8 mb-8">
            <h3 class="font-bold text-[22px] leading-[33px] mb-4">Visi</h3>
            <div class="text-bl-secondary leading-[28px] prose max-w-none">
                {!! \Illuminate\Support\Str::markdown(getWebConfiguration()->vision) !!}
            </div>
        </div>

        <div class="rounded-3xl bg-white border border-bl-border p-8">
            <h3 class="font-bold text-[22px] leading-[33px] mb-4">Misi</h3>
            <div class="text-bl-secondary leading-[28px] prose max-w-none">
                {!! \Illuminate\Support\Str::markdown(getWebConfiguration()->mission) !!}
            </div>
        </div>
    </div>
</x-layouts.frontend>
