<section class="py-12 bg-secondary-light">
    <div class="max-w-screen-xl mx-auto px-4">
        <div class="flex items-end mb-8 gap-3">
            <div>
                <h2 class="text-3xl lg:text-4xl font-black uppercase tracking-tighter text-white">Игры сегодня
                </h2>
            </div>
            <a href="{{ route('parties') }}"
                class="sm:block text-sm font-bold text-primary hover:underline uppercase tracking-wider">
                Все расписание →
            </a>
        </div>

        @if(count($games) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($games as $party)
                    <x-party-card :party="$party" />
                @endforeach
            </div>
        @else
            <div class="p-12 text-center border-2 border-dashed border-gray-800 rounded-[2rem]">
                <p class="text-gray-400 font-medium italic">На сегодня все партии уже набраны или еще не запланированы.
                    <br> Загляните в полное расписание!
                </p>
                <a href="{{ route('parties') }}"
                    class="inline-block mt-4 text-blue-600 font-bold uppercase text-sm">Перейти к календарю</a>
            </div>
        @endif
    </div>
</section>
