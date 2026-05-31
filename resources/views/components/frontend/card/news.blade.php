<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[30px]">
    @foreach ($news as $item)
        <a href="{{ route('news.show', $item->slug) }}" class="rounded-3xl p-[10px] pb-[30px] bg-white border border-transparent hover:ring-2 hover:ring-bl-blue transition-all duration-300 group">
            <div class="rounded-[20px] h-[200px] overflow-hidden">
                <img src="{{ asset($item->thumbnail) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" alt="{{ $item->title }}">
            </div>
            <div class="flex flex-col gap-2 mt-4 px-3">
                <p class="text-sm text-bl-secondary">{{ $item->created_at->format('d M Y') }}</p>
                <h5 class="font-bold text-xl leading-[30px] line-clamp-2">{{ $item->title }}</h5>
                <p class="text-bl-secondary text-sm leading-[24px] line-clamp-2">{{ strip_tags(\Illuminate\Support\Str::limit($item->content, 100)) }}</p>
            </div>
        </a>
    @endforeach
</div>
