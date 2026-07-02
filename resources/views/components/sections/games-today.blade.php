<section class="py-12 bg-secondary-light">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="flex items-end mb-8 gap-3">
            <div>
                <h2 class="text-3xl lg:text-4xl font-black uppercase tracking-tighter text-white">Игры сегодня
                </h2>
            </div>
            <a href="{{ route('parties') }}"
                class="sm:block text-sm font-bold text-primary hover:underline uppercase tracking-wider">
                Всё расписание
                <x-heroicon-o-arrow-right class="w-5 h-5 inline" />
            </a>
        </div>

        <div class="flex mb-12 space-y-8 space-x-8 flex-wrap">
            @foreach($games as $party)
                <x-party-card :party="$party" />
            @endforeach
        </div>
    </div>
</section>
