<x-layout title="Расписание игр">
    <div class="max-w-screen-xl mx-auto p-2">
        <div class="space-y-8">
                @forelse($parties->groupBy(fn ($party) => $party->datetime->format('d.m.Y')) as $datetime => $dayParties)
                    <section>
                        <h3 class="flex items-center text-xl font-bold mb-4 text-white">
                            <x-heroicon-o-calendar class="w-6 h-6 mr-3 text-primary" />
                            {{ $datetime }}
                        </h3>

                        <div class="flex mb-12 space-y-8 md:space-x-8 flex-wrap">
                            @foreach($dayParties as $party)
                                <x-party-card :party="$party" />
                            @endforeach
                        </div>
                    </section>
                @empty
                    <x-no-records/>
                @endforelse
        </div>
    </div>
</x-layout>
