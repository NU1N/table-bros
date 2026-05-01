<x-layout title="Лого — Твой проводник в мир настольных игр">
    <section class="relative overflow-hidden bg-gray-900 pt-16 pb-20 lg:pt-16 lg:pb-40">
        <div class="max-w-screen-xl mx-auto px-4 flex flex-col lg:flex-row items-center gap-12">
            <div class="flex-1 text-center lg:text-left z-10">
                <span
                    class="inline-block bg-blue-100 text-blue-700 text-xs font-black uppercase tracking-widest px-4 py-1.5 rounded-full mb-6">
                    Бросай кубики, а не друзей
                </span>
                <h1 class="text-5xl lg:text-7xl font-black text-white uppercase tracking-tighter mb-8">
                    Найди свою идеальную <span class="text-blue-600">партию</span>
                </h1>
                <p class="text-xl text-gray-400 mb-10 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    Больше никаких долгих переписок в чатах — выбирай игру и приходи побеждать.
                </p>
                <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                    <a href="{{ route('parties') }}"
                        class="px-8 py-5 bg-blue-600 text-white font-black uppercase tracking-widest rounded-2xl hover:scale-105 transition-transform shadow-xl">
                        Смотреть расписание
                    </a>
                    <button @click="loginModal = true"
                        class="px-8 py-5 bg-white border-2 cursor-pointer border-gray-700 text-blue-500 font-black uppercase hover:scale-105  tracking-widest rounded-2xl hover:bg-gray-50 transition-transfor">
                        Присоединиться
                    </button>
                </div>
            </div>


            <div class="flex-1 relative">
                <div
                    class="relative z-10 rounded-3xl overflow-hidden rotate-2 hover:rotate-0 transition-transform duration-500">
                    <img src="{{ asset('default/images/art.png') }}" alt="Board games">
                </div>

                <div
                    class="absolute -top-10 -right-10 w-64 h-64 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
                </div>
                <div
                    class="absolute -bottom-10 -left-10 w-64 h-64 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000">
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-700">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="flex items-end mb-8 gap-3">
                <div>
                    <h2 class="text-3xl lg:text-4xl font-black uppercase tracking-tighter text-white">Игры сегодня
                    </h2>
                </div>
                <a href="{{ route('parties') }}"
                    class="sm:block text-sm font-bold text-blue-600 hover:underline uppercase tracking-wider">
                    Все расписание →
                </a>
            </div>

            @if(range(1, 3) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach(range(1, 3) as $game)
                        <x-party-card :game="$game" />
                    @endforeach
                </div>
            @else
                <div class="p-12 text-center border-2 border-dashed border-gray-800 rounded-[2rem]">
                    <p class="text-gray-400 font-medium italic">На сегодня все партии уже набраны или еще не запланированы.
                        <br> Загляните в полное расписание!
                    </p>
                    <a href="{{ route('games.index') }}"
                        class="inline-block mt-4 text-blue-600 font-bold uppercase text-sm">Перейти к календарю</a>
                </div>
            @endif
        </div>
    </section>


    <section class="py-24 bg-gray-800/30">
        <div class="max-w-screen-xl mx-auto px-4">

            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <h2 class="text-3xl lg:text-5xl font-black uppercase tracking-tighter text-white mb-4">Жизнь
                        сообщества</h2>
                    <p class="text-gray-400 max-w-xl">Читайте о новинках нашей игротеки, отчетах с
                        прошедших турниров и полезные советы для новичков.</p>
                </div>
                <a href="{{ route('news') }}"
                    class="sm:block text-sm font-bold text-blue-600 hover:underline uppercase tracking-wider">
                    Все новости →
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach(range(1, 2) as $post)
                    <x-news-card :post="$post" />
                @endforeach
            </div>

        </div>
    </section>

    <!-- Блок Галереи -->
    <section class="py-24 bg-gray-900 overflow-hidden">
        <div class="max-w-screen-xl mx-auto px-4">

            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-5xl font-black uppercase tracking-tighter text-white mb-4">Атмосфера
                    нашего клуба</h2>
                <div class="h-1.5 w-24 bg-blue-600 mx-auto rounded-full"></div>
            </div>

            <!-- Bento Grid Галерея -->
            <div class="grid grid-cols-2 md:grid-cols-4 grid-rows-2 gap-4 h-[500px] md:h-[700px]">

                <!-- Большое вертикальное фото -->
                <div class="col-span-2 row-span-2 relative group overflow-hidden rounded-[2rem]">
                    <img src="{{ asset('default/images/party-preview.png') }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                        alt="Игротека">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-8">
                        <span class="text-white font-bold uppercase tracking-widest">Вечерние посиделки</span>
                    </div>
                </div>

                <div class="col-span-2 row-span-1 relative group overflow-hidden rounded-[2rem]">
                    <img src="{{ asset('default/images/party-preview.png') }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                        alt="Настолки">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                        <span class="text-white font-bold uppercase tracking-widest">Накал страстей</span>
                    </div>
                </div>

                <div class="col-span-1 row-span-1 relative group overflow-hidden rounded-[2rem]">
                    <img src="{{ asset('default/images/party-preview.png') }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                        alt="Миниатюры">
                </div>

                <div class="col-span-1 row-span-1 relative group overflow-hidden rounded-[2rem]">
                    <img src="{{ asset('default/images/party-preview.png') }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                        alt="Карты">
                </div>

            </div>
        </div>
    </section>


    <!-- Блок Гейм-мастеров -->
    <section class="py-24 bg-gray-800">
        <div class="max-w-screen-xl mx-auto px-4">

            <div class="flex flex-col md:flex-row items-center justify-between mb-16 gap-4">
                <div class="text-center md:text-left">
                    <h2 class="text-3xl lg:text-5xl font-black uppercase tracking-tighter text-white mb-4">Наши
                        мастера</h2>
                    <p class="text-gray-400 max-w-xl">Те, кто знает правила за вас, объяснит нюансы и
                        сделает каждую партию незабываемой.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

                <div class="group relative ">
                    <div class="relative overflow-hidden rounded-[2.5rem] aspect-[3/4]">
                        <img src="{{ asset('default/images/party-preview.png') }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                            alt="Master">
                        <div class="absolute bottom-4 left-4 right-4">
                            <div class="bg-white/90 backdrop-blur-md p-4 rounded-2xl shadow-xl">
                                <h4 class="text-lg font-black text-gray-900 uppercase mb-1">Артём</h4>
                                <p class="text-[10px] font-bold text-purple-600 uppercase tracking-widest mb-2">RPG &
                                    Storytelling</p>
                                <div class="flex gap-1 text-[10px] font-bold text-gray-400">Партий: 150+</div>
                            </div>
                        </div>
                    </div>
                    <p
                        class="mt-4 text-sm text-gray-500 px-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        Мастер подземелий. Проведет вас через любые миры D&D и Pathfinder.
                    </p>
                </div>

                <div class="group relative ">
                    <div class="relative overflow-hidden rounded-[2.5rem] aspect-[3/4]">
                        <img src="{{ asset('default/images/party-preview.png') }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                            alt="Master">
                        <div class="absolute bottom-4 left-4 right-4">
                            <div class="bg-white/90 backdrop-blur-md p-4 rounded-2xl shadow-xl">
                                <h4 class="text-lg font-black text-gray-900 uppercase mb-1">Артём</h4>
                                <p class="text-[10px] font-bold text-purple-600 uppercase tracking-widest mb-2">RPG &
                                    Storytelling</p>
                                <div class="flex gap-1 text-[10px] font-bold text-gray-400">Партий: 150+</div>
                            </div>
                        </div>
                    </div>
                    <p
                        class="mt-4 text-sm text-gray-500 px-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        Мастер подземелий. Проведет вас через любые миры D&D и Pathfinder.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <section class="py-24 bg-gray-900">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="mb-12 text-center lg:text-left">
                <h2 class="text-3xl lg:text-5xl font-black uppercase tracking-tighter text-white mb-4">Ждем вас в
                    гости</h2>
                <p class="text-gray-400">Наш уютный штаб находится в самом сердце города</p>
            </div>

            <div class="relative h-[450px] rounded-[3rem] overflow-hidden shadow-2xl border border-gray-700">
                <div
                    class="absolute top-8 left-8 z-10 hidden lg:block max-w-sm bg-white/90 backdrop-blur-md p-8 rounded-3xl shadow-2xl">
                    <h4 class="text-xl font-black uppercase tracking-tighter mb-4 text-gray-900">Клуб "Название клуба"
                    </h4>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-600 mt-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                                    stroke-width="2" />
                                <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" />
                            </svg>
                            <p class="text-sm font-bold text-gray-600">г. Брянск, тут будет адресс</p>
                        </div>
                    </div>
                </div>

                <!-- Сама карта -->
                <div class="w-full h-full grayscale-[0.2] contrast-[1.1] invert-[0.9] hue-rotate-180">
                    <div class="w-full h-full text-3xl text-center">ТУТ БУДЕТ КАРТА</div>
                    <iframe src="https://yandex.ru[ID_КАРТЫ]&amp;source=constructor" width="100%" height="100%"
                        frameborder="0" style="border:0;"></iframe>
                </div>
            </div>
        </div>
    </section>


</x-layout>