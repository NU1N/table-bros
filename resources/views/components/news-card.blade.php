@props(['post'])

<a href="{{ route('news-post', $post->slug) }}">
    <article
        class="bg-secondary border border-secondary-light hover:border-primary-dark rounded-3xl overflow-hidden shadow transition flex flex-col lg:flex-row mb-6 group cursor-pointer">

        <div class="lg:w-1/3 h-68 overflow-hidden">
            <img class="h-full w-full object-cover"
                src="{{ $post->preview_image_url }}" alt="{{ $post->title }}">
        </div>


        <div class="p-6 lg:p-8 flex flex-col flex-grow lg:w-2/3">
            <div class="flex items-center gap-3 mb-4">
                <span class="text-xs font-bold text-white">
                    {{ $post->created_at->format('d.m.Y h:i') }}
                </span>
            </div>

            <h3 class="text-2xl font-black text-primary mb-4 tracking-tighter line-clamp-3">
                {{ $post->title }}
            </h3>

            <p class="text-white text-base leading-relaxed  mb-4  ">
                {{ $post->excerpt }}
            </p>

        </div>
    </article>
</a>
