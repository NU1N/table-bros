<div class="rounded-3xl border bg-secondary border-secondary-light p-6 lg:p-8">
    <div class="flex items-center justify-between mb-8">
        <h3 class="text-2xl font-black text-white text-white uppercase tracking-tighter">Мои
            записи</h3>
    </div>

    <!-- Список будущих игр -->
    <div class="space-y-4">
        @forelse($registrations as $party)
            <a href="{{ route('party', $party->slug) }}" class="p-1 text-white hover:text-primary transition-colors">
            <div
                class="group bg-secondary-medium flex flex-col md:flex-row items-center gap-4 p-4 rounded-2xl border  transition-all border-secondary-light hover:border-primary-dark">

                <div class="flex-grow text-center md:text-left">
                    <h4 class="font-black  text-primary uppercase leading-tight mb-1">
                        {{ $party ->title }}
                    </h4>
                    <div
                        class="flex flex-wrap justify-center md:justify-start gap-3 text-xs text-white font-bold uppercase tracking-wider">
                        <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                    stroke-width="2" />
                            </svg> {{ $party->datetime->format('d.m.Y') }}</span>
                        <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                    stroke-width="2" />
                            </svg>
                            {{ $party->datetime->format('H:i') }} - {{ $party->datetime->addHours($party->duration)->format('H:i') }} </span>
                    </div>
                </div>
            </div>

            </a>
        @empty
            <div class="text-center py-12 rounded-2xl">
                <p class="text-primary">Вы еще не записались ни на одну игру</p>
                <a href="{{route('parties')}}" class="text-primary font-bold uppercase text-xs mt-2 inline-block underline">Найти
                    партию</a>
            </div>
        @endforelse
    </div>
</div>
