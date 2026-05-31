<x-layouts.frontend title="Berita">
    <x-frontend.header>
        <x-slot name="title">Berita</x-slot>
        <x-slot name="description">Berita yang ada di {{ getWebConfiguration()->name }}</x-slot>
    </x-frontend.header>

    <div class="w-full max-w-[1130px] mx-auto px-4 mt-[50px] mb-[100px]">
        <x-frontend.card.news :news="$news" />
        <div class="flex justify-center mt-8">
            {!! $news->links() !!}
        </div>
    </div>
</x-layouts.frontend>
