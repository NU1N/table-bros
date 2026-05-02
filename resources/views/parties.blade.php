<x-layout title="Расписание игр">
    <div class="max-w-screen-xl mx-auto p-4">
        <div class="space-y-8">
            @foreach(range(1, 4) as $games)
                <section>
                    <h3 class="flex items-center text-xl font-bold mb-4 text-white">
                        <svg class="w-6 h-6 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        20 апреля — 26 апреля
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                        @foreach(range(1, 4) as $game)
                            <x-party-card :game="$game" />
                        @endforeach>
                    </div>
                </section>
            @endforeach
        </div>
    </div>
</x-layout>