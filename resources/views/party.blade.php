@php
    use Filament\Forms\Components\RichEditor\RichContentRenderer;
@endphp
<x-layout title="{{ $party->title }}">
    <div class="max-w-screen-xl mx-auto p-4">


        <main class="max-w-screen-xl mx-auto lg:p-8">

            <nav class="mb-8">
                <a href="{{ route('parties') }}"
                   class="inline-flex items-center text-sm font-bold text-primary hover:underline uppercase tracking-wider">
                    <x-heroicon-o-chevron-left class="w-5 h-5 mr-3 text-primary" />
                    Назад к партиям
                </a>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-8">
                    <div
                        class="rounded-3xl overflow-hidden border bg-secondary bg-cover bg-center border-secondary-light shadow-sm">
                        <img class="w-full h-48 lg:h-96 object-cover"
                             src="{{ $party->preview_image_url }}" alt="{{ $party->title }}"/>
                        <div class="p-6 lg:p-8 w-full">
                            @if(count($party->tags))
                                <div class="flex flex-wrap gap-2 mb-4">
                                    @foreach($party->tags as $tag)
                                        <span
                                            class="px-3 py-1 text-xs font-semibold bg-primary/20 text-primary rounded-full uppercase">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                            <h1 class="text-3xl lg:text-4xl font-extrabold text-primary mb-4 uppercase">
                                {{ $party->title }}
                            </h1>
                            <x-sharing/>
                            <div class="mt-4 prose dark:prose-invert max-w-[100%]">
                                {!!
                                    RichContentRenderer::make($party->description)
                                        ->fileAttachmentsDisk('public')
                                        ->fileAttachmentsVisibility('public')
                                        ->toHtml()
                                !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">

                    <div
                        class="p-6 lg:p-8 rounded-3xl border bg-secondary border-secondary-light lg:sticky top-25 z-50">
                        <div class="space-y-4 mb-6">
                            <div class="flex items-center text-white">
                                <x-heroicon-o-calendar class="w-5 h-5 mr-3 text-primary" />
                                <span class="font-medium">{{ $party->datetime->format('d.m.Y') }}</span>
                            </div>
                            <div class="flex items-center text-white">
                                <x-heroicon-o-clock class="w-5 h-5 mr-3 text-primary" />
                                <span class="font-medium">
                                    {{ $party->datetime->format('H:i') }} - {{ $party->datetime->addHours($party->duration)->format('H:i') }}
                                </span>
                            </div>
                            <div class="flex items-center text-white">
                                <x-heroicon-o-credit-card class="w-5 h-5 mr-3 text-primary" />
                                <span class="font-medium">
                                    @if( $party->price )
                                        {{ $party->price }} ₽
                                    @else
                                        Бесплатно
                                    @endif
                                </span>
                            </div>
                            <div class="flex items-center text-white">
                                <x-heroicon-o-home class="w-5 h-5 mr-3 text-primary" />
                                <span class="font-medium">{{ $party->address }}</span>
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-3 p-3 my-5 border-white/30 rounded-2xl border border-secondary-light bg-secondary-medium backdrop-blur-md">
                            <img class="w-10 h-10 rounded-full object-cover"
                                 src="{{ $party->master->avatar_url }}"
                                 alt="Аватар ведущего">
                            <div>
                                <p class="text-sm font-bold text-white ">
                                    {{ $party->master->name }}
                                </p>
                                <p class="text-[10px] text-primary uppercase font-bold">
                                    @if($party->master_id === auth()->id())
                                        Ты ведущий
                                    @else
                                        Ведущий
                                    @endif
                                </p>
                            </div>

                        </div>

                        @if($party->spots_remaining || $isParticipant)
                            @if(auth()->check())
                                @if($party->master_id !== auth()->id())
                                    <form action="{{ route('party.signup', $party) }}" method="POST">
                                        @csrf
                                        @if($isParticipant)
                                            <button type="submit"
                                                    class="w-full py-4 rounded-2xl font-bold transition-all flex items-center justify-center gap-2 cursor-pointer bg-red-700 text-white hover:bg-red-800 border-red-200">
                                        <span class="flex items-center gap-2">
                                            Отменить запись
                                        </span>
                                            </button>
                                        @else
                                            <button type="submit"
                                                    class="w-full py-4 rounded-2xl font-bold transition-all flex items-center justify-center gap-2 cursor-pointer bg-primary text-secondary hover:bg-primary-dark">
                                        <span class="flex items-center gap-2">
                                            Участвовать
                                        </span>
                                            </button>
                                        @endif
                                    </form>
                                @endif
                            @else

                                <button @click="loginModal = true"
                                   class="w-full py-4 rounded-2xl font-bold bg-primary text-secondary hover:bg-primary-dark transition-all flex items-center justify-center gap-2 cursor-pointer">
                                    <span class="flex items-center gap-2">
                                        Войдите для записи
                                    </span>
                                </button>
                            @endif
                        @endif


                        <h3 class="text-xl font-bold text-white my-3 flex items-center">
                            Участники
                            <span class="ml-3 text-sm font-medium text-white">
                                {{ $party->participants->count() }} / {{$party->spots}}
                            </span>
                        </h3>
                        <div class="grid grid-cols-1 gap-4">
                            @forelse($party->participants as $participant)
                                <div class="flex items-center gap-3">
                                    <img class="w-10 h-10 rounded-full object-cover"
                                         src="{{ $participant->avatar_url }}"
                                         alt="Аватар {{$participant->name }}">
                                    <p class="text-sm font-medium text-white">{{ $participant->name }}</p>
                                </div>
                            @empty
                                <span class="text-sm font-medium text-white">
                                    Пока нет участников
                                </span>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>
</x-layout>
