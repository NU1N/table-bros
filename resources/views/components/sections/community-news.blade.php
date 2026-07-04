<section class="py-12 bg-secondary-medium">
    <div class="max-w-screen-xl mx-auto px-4">

        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <h2 class="text-3xl lg:text-5xl font-black uppercase tracking-tighter text-white mb-4">Жизнь
                    сообщества</h2>
                <p class="text-white max-w-xl">Читайте о новинках нашей игротеки, отчетах с
                    прошедших турниров и полезные советы для новичков.</p>
            </div>
            <a href="{{ route('news') }}"
                class="sm:block text-sm font-bold text-primary hover:underline uppercase tracking-wider">
                Все новости
                <x-heroicon-o-arrow-right class="w-5 h-5 inline" />
            </a>
        </div>

        <div class="grid grid-cols-1">
            @foreach($news as $post)
                <x-news-card :post="$post" />
            @endforeach
        </div>

    </div>
</section>
