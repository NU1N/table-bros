<x-layout title="Расписание игр">
    <div class="max-w-screen-xl mx-auto p-4">
        <div class="space-y-8">
            @if($parties->count())
                @foreach($parties->groupBy(fn ($party) => $party->datetime->format('d.m.Y')) as $datetime => $dayParties)
                    <section>
                        <h3 class="flex items-center text-xl font-bold mb-4 text-white">
                            <x-heroicon-o-calendar class="w-6 h-6 mr-3 text-primary" />
                            {{ $datetime }}
                        </h3>

                        <div class="flex mb-12 space-y-8 space-x-8 flex-wrap">
                            @foreach($dayParties as $party)
                                <x-party-card :party="$party" />
                            @endforeach
                        </div>
                    </section>
                @endforeach
            @else
                <div class="min-h-screen flex items-center justify-center px-4">
                    <div class="text-center max-w-lg">

                        <h1 class="text-2xl lg:text-3xl font-black text-white uppercase tracking-tighter mb-8">
                         Скоро тут что то будет 😉
                        </h1>

                        <a href="{{ route('landing') }}"
                           class="inline-flex items-center gap-2 bg-primary text-secondary font-bold py-4 px-8 rounded-2xl hover:bg-primary-dark transition-all uppercase tracking-wider">
                            На главную
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layout>
