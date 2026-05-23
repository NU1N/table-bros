@props(['party'])

<a href="{{ route('party', $party['slug']) }}">
    <div
        class="max-w-sm  border  rounded-xl shadow bg-secondary border-secondary-light overflow-hidden hover:border-primary-dark transition">

        <div class="relative h-48 overflow-hidden">
            <img class="w-full h-full object-cover " src="{{ $party['image'] ?? asset('default/images/party-preview.png') }}" />

            @if($party['full'])
                <div class="absolute inset-0 flex items-center justify-center bg-black/50">
                    <span class="text-white font-bold uppercase px-4 py-2 rounded-lg">
                        Все места заняты
                    </span>
                </div>
            @endif

            <div class="absolute bottom-2 left-1  text-white text-sm font-mono px-2 py-1 rounded  gap-1 flex">

                <div
                    class="bg-white/20 backdrop-blur-md text-white text-xs font-mono rounded-full border border-white/30 py-2 px-2">
                    <div class="flex items-center gap-2">

                        <div class="flex flex-col">
                            <span class="text-xs text-white font-semibold">
                                {{ $party['date'] }}
                                {{ $party['time'] }}
                            </span>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white/20 backdrop-blur-md text-white text-xs font-mono rounded-full border border-white/30 pe-2">
                    <div class="flex items-center gap-2">
                        <img class="w-8 h-8 rounded-full object-cover" src="{{ $party['hostAvatar'] }}">
                        <div class="flex flex-col">
                            <span class="text-xs text-white font-semibold">{{ $party['host'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-5">
            <div class="flex justify-between items-start mb-2">
                <span class="text-[10px] font-bold px-2 py-0.5 rounded-full uppercase bg-white text-primary-dark">
                    {{ $party['game'] }}
                </span>
            </div>


            <h5 class="mb-2 text-xl font-bold tracking-tight text-primary uppercase">
                {{ $party['title'] }}
            </h5>


            <div class="flex items-center text-white mb-2">
                <span class="font-medium">{{ $party['price'] }}</span>
            </div>

            <p class="mb-3 font-normal text-white text-sm line-clamp-2">
                {{ $party['description'] }}
            </p>

            <div class="flex items-center justify-between mt-4">
                <div class="flex -space-x-2">
                    <img class="w-8 h-8 rounded-full object-cover" src="{{ $party['avatar'] }}">
                    <img class="w-8 h-8 rounded-full object-cover" src="{{ $party['avatar'] }}">
                    <div
                        class="w-8 h-8 rounded-full border-2 border-white bg-gray-200 flex items-center justify-center text-[10px] text-gray-500">
                        +{{ $party['maxSpots'] - $party['spots'] }}
                    </div>
                </div>
                <span class="text-sm font-medium text-white">{{ $party['spots'] }} / {{ $party['maxSpots'] }} мест</span>
            </div>
        </div>
    </div>
</a>
