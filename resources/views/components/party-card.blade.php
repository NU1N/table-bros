@props(['party'])

<a href="{{ route('party', $party->slug) }}" class="w-full md:w-xs">
    <div
        class="border rounded-xl shadow bg-secondary border-secondary-light overflow-hidden hover:border-primary-dark transition">

        <div class="relative h-48 overflow-hidden">
            <img class="w-full h-full object-cover"
                 src="{{ $party->preview_image_url }}"
                 alt="{{ $party->title }}"/>

            @if($party->no_spots)
                <div class="absolute inset-0 flex items-center justify-center bg-black/50">
                    <span class="text-white font-bold uppercase px-4 py-2 rounded-lg">
                        Все места заняты
                    </span>
                </div>
            @endif

            <div class="absolute bottom-2 left-1 text-white text-sm font-mono px-2 py-1 rounded gap-1 flex">
                <div class="bg-white/20 backdrop-blur-md text-white text-xs font-mono rounded-full border border-white/30 py-2 px-2">
                    <div class="flex items-center gap-2">
                        <div class="flex flex-col">
                            <span class="text-xs text-white font-semibold">
                                {{ $party->datetime->format('d.m.Y H:i') }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="bg-white/20 backdrop-blur-md text-white text-xs font-mono rounded-full border border-white/30 pe-2">
                    <div class="flex items-center gap-2">
                        <img class="w-8 h-8 rounded-full object-cover" src="{{ $party->master->avatar_url }}" alt="Аватар ведущего">
                        <div class="flex flex-col">
                            <span class="text-xs text-white font-semibold">{{ $party->master->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-5">
            <div class="flex justify-start items-start mb-2 h-6 flex-wrap overflow-hidden space-y-3"
                 title="{{implode(', ', $party->tags)}}">
                @foreach($party->tags as $tag)
                    <span class="text-[10px] font-bold px-2 mx-0.5 py-0.5 rounded-full uppercase bg-white text-primary-dark text-nowrap">
                    {{ $tag }}
                    </span>
                @endforeach
            </div>

            <h5 class="mb-2 h-14 text-xl font-bold tracking-tight text-primary uppercase line-clamp-2"
                title="{{ $party->title }}">
                {{ $party->title }}
            </h5>

            <div class="flex items-center text-white mb-2">
                <span class="font-medium">
                    @if( $party->price )
                        {{ $party->price }} ₽
                    @else
                        Бесплатно
                    @endif
                </span>
            </div>
            <div class="flex items-center text-white mb-2">
                <span class="font-medium">{{ $party->address }}</span>
            </div>
            <p class="mb-3 font-normal text-white text-sm line-clamp-3 h-16"
               title="{{ $party->short_description }}">
                {{ $party->short_description }}
            </p>

            <div class="flex items-center justify-between mt-4 h-6">
                <div class="flex -space-x-2">
                    @foreach($party->participants->take(5) as $participant)
                        <img class="w-8 h-8 rounded-full object-cover"
                             src="{{ $participant->avatar_url }}"
                             alt="Аватар {{ $participant->name }}">
                    @endforeach
                    @if(max($party->participants->count() - 5, 0))
                       <div class="w-8 h-8 rounded-full border-2 border-white bg-gray-200 flex items-center justify-center text-[10px] text-gray-500">
                                +{{ $party->participants->count() - 5 }}
                       </div>
                    @endif
                </div>
                @if($party->spots_remaining)
                    <span class="text-sm font-medium text-white">свободно {{ $party->spots_remaining }} из {{ $party->spots }} мест</span>
                @endif
            </div>
        </div>
    </div>
</a>
