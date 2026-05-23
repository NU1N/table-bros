<div class="rounded-3xl border bg-secondary border-secondary-light p-6 lg:p-8">
    <div class="flex items-center justify-between mb-8">
        <h3 class="text-2xl font-black text-white text-white uppercase tracking-tighter">Мои
            записи</h3>
    </div>

    <!-- Список будущих игр -->
    <div class="space-y-4">
        @forelse($registrations as $registration)
            <div
                class="group bg-secondary-light flex flex-col md:flex-row items-center gap-4 p-4 rounded-2xl border  transition-all border-secondary-light hover:border-primary-dark">
                <img class="w-full md:w-24 h-24 rounded-xl object-cover"
                    src="{{ asset('default/images/party-preview.png') }}">
                <div class="flex-grow text-center md:text-left">
                    <h4 class="font-black  text-primary uppercase leading-tight mb-1">
                        {{ $registration['title'] }}
                    </h4>
                    <div
                        class="flex flex-wrap justify-center md:justify-start gap-3 text-xs text-white font-bold uppercase tracking-wider">
                        <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                    stroke-width="2" />
                            </svg> {{ $registration['date'] }}</span>
                        <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                    stroke-width="2" />
                            </svg> {{ $registration['time'] }}</span>
                    </div>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('party', 'gloomy-harbor') }}" class="p-3 text-white hover:text-primary transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" />
                            <path
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                stroke-width="2" />
                        </svg>
                    </a>
                    <button class="p-3 text-white hover:text-red-600 transition-colors cursor-pointer"
                        title="Отменить запись">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </button>
                </div>
            </div>
        @empty
            <div class="text-center py-12 border-2 border-dashed border-gray-100 rounded-2xl">
                <p class="text-gray-400 italic">Вы еще не записались ни на одну игру</p>
                <a href="/" class="text-blue-600 font-bold uppercase text-xs mt-2 inline-block">Найти
                    партию</a>
            </div>
        @endforelse
    </div>
</div>
