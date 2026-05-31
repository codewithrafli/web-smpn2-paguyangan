<x-layouts.frontend title="Berita">
    <x-frontend.header>
        <x-slot name="title">{{ $news->title }}</x-slot>
        <x-slot name="description">{{ $news->description }}</x-slot>
    </x-frontend.header>

    <div class="w-full max-w-[850px] mx-auto px-4 mt-[50px] mb-[100px]">
        <div class="rounded-[30px] overflow-hidden mb-8">
            <img src="{{ asset($news->thumbnail) }}" class="w-full h-[300px] md:h-[400px] object-cover" alt="{{ $news->title }}">
        </div>
        <article class="prose max-w-none leading-[28px] text-bl-primary">
            {!! \Illuminate\Support\Str::markdown($news->content) !!}
        </article>
    </div>
</x-layouts.frontend>
