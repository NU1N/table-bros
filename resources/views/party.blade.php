@php
    use Filament\Forms\Components\RichEditor\RichContentRenderer;
@endphp
<x-layout title="{{ $party->title }}">
    <div class="max-w-screen-xl mx-auto p-4">

        @php
            $isJoined = auth()->check() && $party->participants()->where('user_id', auth()->id())->exists();
        @endphp

        <main class="max-w-screen-xl mx-auto p-4 lg:p-8"
              x-data="{ joined: @json($isJoined), count: {{ $party->participants()->count() }}, max: {{ $party->max_spots }} }">

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
                        <img class="w-full h-64 lg:h-96 object-cover"
                             src="{{ $party->preview_image_url }}" alt="{{ $party->title }}"/>
                        <div class="p-6 lg:p-8">
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
                            <div class="mt-4 prose dark:prose-invert">
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
                                <span class="font-medium">{{ $party->datetime->format('H:i') }}</span>
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
                                 src="{{ $party->host_avatar ?? asset('default/images/avatar.png') }}">
                            <div>
                                <p class="text-sm font-bold text-white ">
                                    {{ $party->master->name }}
                                </p>
                                <p class="text-[10px] text-primary uppercase font-bold">Ведущий</p>
                            </div>

                        </div>

                        @if(auth()->check())
                            <form action="{{ route('party.signup', $party) }}" method="POST">
                                @csrf
                                <button type="submit"
                                        :class="joined ? 'bg-red-700 text-white hover:bg-red-800 border-red-200' : 'bg-primary text-secondary hover:bg-primary-dark'"
                                        class="w-full py-4 rounded-2xl font-bold transition-all flex items-center justify-center gap-2 cursor-pointer">

                                    <template x-if="!joined">
                                        <span class="flex items-center gap-2">
                                            Участвовать
                                        </span>
                                    </template>

                                    <template x-if="joined">
                                        <span class="flex items-center gap-2">
                                            Отменить запись
                                        </span>
                                    </template>
                                </button>
                            </form>
                        @else
                            <a href="{{ route('auth.redirect', 'yandex') }}"
                               class="w-full py-4 rounded-2xl font-bold bg-primary text-secondary hover:bg-primary-dark transition-all flex items-center justify-center gap-2 cursor-pointer">
                                <span class="flex items-center gap-2">
                                    Войдите для записи
                                </span>
                            </a>
                        @endif

                        <h3 class="text-xl font-bold text-white my-3 flex items-center">
                            Участники
                            <span class="ml-3 text-sm font-medium text-white"
                                  x-text="count + '/' + max"></span>
                        </h3>
                        <div class="grid grid-cols-1 gap-4">
                            @foreach($party->participants()->take(5)->get() as $participant)
                                <div class="flex items-center gap-3">
                                    <img class="w-10 h-10 rounded-full object-cover"
                                         src="{{ $participant->profile_avatar ?? asset('default/images/avatar.png') }}">
                                    <p class="text-sm font-medium text-white">{{ $participant->name }}</p>
                                </div>
                            @endforeach

                            @if(auth()->check() && $isJoined)
                                <template x-if="!joined">
                                    <div class="flex items-center gap-3" x-transition>
                                        <img class="w-10 h-10 rounded-full object-cover"
                                             src="{{ asset('default/images/avatar.png') }}">
                                        <p class="text-sm font-bold text-green-500">Вы идете!</p>
                                    </div>
                                </template>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>
</x-layout>
