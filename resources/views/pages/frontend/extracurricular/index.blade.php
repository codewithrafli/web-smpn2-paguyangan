<x-layouts.frontend title="Ekstrakurikuler">
    <x-frontend.header>
        <x-slot name="title">Ekstrakurikuler</x-slot>
        <x-slot name="description">Ekstrakurikuler yang ada di {{ getWebConfiguration()->name }}</x-slot>
    </x-frontend.header>

    <div class="w-full max-w-[1130px] mx-auto px-4 mt-[50px] mb-[100px]">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[30px]">
            @foreach ($extracurriculars as $extracurricular)
                <a href="{{ route('extracurricular.show', $extracurricular->id) }}" class="rounded-3xl p-[10px] pb-[30px] bg-white border border-transparent hover:ring-2 hover:ring-bl-blue transition-all duration-300 group">
                    <div class="rounded-[20px] h-[200px] overflow-hidden">
                        <img src="{{ asset($extracurricular->image_url) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="{{ $extracurricular->name }}">
                    </div>
                    <div class="flex flex-col gap-2 mt-4 px-3">
                        <h5 class="font-bold text-xl">{{ $extracurricular->name }}</h5>
                        <p class="text-bl-secondary text-sm leading-[24px] line-clamp-2">{{ $extracurricular->description }}</p>
                        <span class="rounded-full bg-bl-grey px-4 py-1 text-xs font-semibold text-bl-secondary w-fit mt-2">{{ $extracurricular->teacher->name }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-layouts.frontend>
