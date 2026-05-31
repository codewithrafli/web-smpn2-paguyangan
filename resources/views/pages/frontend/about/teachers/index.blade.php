<x-layouts.frontend title="Guru dan Karyawan">
    <x-frontend.header>
        <x-slot name="title">Guru dan Karyawan</x-slot>
        <x-slot name="description">Guru dan Karyawan yang ada di {{ getWebConfiguration()->name }}</x-slot>
    </x-frontend.header>

    <div class="w-full max-w-[1130px] mx-auto px-4 mt-[50px] mb-[100px]">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[30px]">
            @foreach ($teachers as $teacher)
                <a href="{{ route('teacher.show', $teacher->id) }}" class="rounded-3xl p-[10px] pb-[20px] bg-white border border-transparent hover:ring-2 hover:ring-bl-blue transition-all duration-300 group text-center">
                    <div class="rounded-[20px] h-[200px] overflow-hidden">
                        <img src="{{ asset($teacher->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="{{ $teacher->name }}">
                    </div>
                    <div class="mt-4 px-2">
                        <h6 class="font-bold text-sm">{{ $teacher->name }}</h6>
                        <p class="text-bl-secondary text-xs mt-1">{{ $teacher->position }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-layouts.frontend>
