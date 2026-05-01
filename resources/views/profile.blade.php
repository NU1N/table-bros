<x-layout title="Мой профиль">
    <div class="max-w-screen-xl mx-auto p-4">
        <main class="max-w-screen-xl mx-auto p-4 lg:p-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">


                <div class="lg:col-span-4 space-y-6">
                    <form action="/profile/update" method="POST" enctype="multipart/form-data"
                        x-data="{ photoPreview: null }">
                        <div class="rounded-3xl border bg-gray-800 border-gray-700 overflow-hidden">
                            <div class="h-24 bg-gradient-to-r from-blue-600 to-purple-600"></div>
                            <div class="p-6 -mt-12 text-center">
                                <div class="relative inline-block mb-4">
                                    <img class="w-24 h-24 rounded-full border-4 border-gray-800 shadow-md object-cover"
                                        :src="photoPreview ? photoPreview :  '{{ asset('default/images/avatar.png') }}'">
                                    <label
                                        class="absolute bottom-0 right-0 p-1.5 bg-white rounded-full border  cursor-pointer  bg-gray-700 border-gray-600 hover:bg-gray-100">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <input type="file" name="avatar" class="hidden" @change="
                            const file = $event.target.files[0];
                            const reader = new FileReader();
                            reader.onload = (e) => { photoPreview = e.target.result; };
                            reader.readAsDataURL(file);
                        ">
                                    </label>
                                </div>


                                <div class="space-y-6 text-left">
                                    <div class="mt-3">
                                        <label for="nickname"
                                            class="block mb-2 text-sm font-bold text-white uppercase tracking-wider">Ваш
                                            никнейм</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400 font-bold">
                                                @
                                            </div>
                                            <input type="text" id="nickname" name="nickname" value="DungeonMaster"
                                                class="border  text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-3 bg-gray-700 border-gray-600 placeholder-gray-400 text-white"
                                                placeholder="Введите ник" required>
                                        </div>
                                        <p class="mt-2 text-xs text-gray-500">Этот ник будут видеть другие игроки в
                                            списке
                                            участников.
                                        </p>
                                    </div>

                                    <div class="mt-3">
                                        <label for="bio"
                                            class="block mb-2 text-sm font-bold text-white uppercase tracking-wider">О
                                            себе</label>
                                        <textarea id="bio" name="bio" rows="3"
                                            class="border   text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-3 bg-gray-700 border-gray-600 text-white placeholder-gray-400 "
                                            placeholder="Люблю евро-геймы, не люблю кубы..."></textarea>
                                    </div>
                                </div>
                                <div class="mt-6 space-y-2">
                                    <button type="submit"
                                        class="w-full text-white cursor-pointer bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-2xl text-sm px-5 py-4 text-center transition-all">
                                        Сохранить изменения
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Статистика -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-4 rounded-2xl border bg-gray-800 border-gray-700 shadow-sm">
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Партий</p>
                            <p class="text-2xl font-black text-blue-600">42</p>
                        </div>
                        <div class="p-4 rounded-2xl border  bg-gray-800 border-gray-700 shadow-sm">
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Часов</p>
                            <p class="text-2xl font-black text-purple-600">128</p>
                        </div>
                    </div>
                </div>

                <!-- Правая колонка: Мои игры (8 колонок) -->
                <div class="lg:col-span-8 space-y-6">
                    <div class="rounded-3xl border bg-gray-800 border-gray-700 p-6 lg:p-8">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="text-2xl font-black text-gray-900 text-white uppercase tracking-tighter">Мои
                                записи</h3>
                        </div>

                        <!-- Список будущих игр -->
                        <div class="space-y-4">
                            @forelse(range(1, 4) as $game)
                                <div
                                    class="group flex flex-col md:flex-row items-center gap-4 p-4 rounded-2xl border  transition-all border-gray-700 hover:border-blue-600">
                                    <img class="w-full md:w-24 h-24 rounded-xl object-cover"
                                        src="{{ asset('default/images/party-preview.png') }}">
                                    <div class="flex-grow text-center md:text-left">
                                        <h4 class="font-black text-gray-900 text-white uppercase leading-tight mb-1">
                                            Мрачная гавань
                                        </h4>
                                        <div
                                            class="flex flex-wrap justify-center md:justify-start gap-3 text-xs text-gray-500 font-bold uppercase tracking-wider">
                                            <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                                        stroke-width="2" />
                                                </svg> 24.04</span>
                                            <span class="flex items-center"><svg class="w-3 h-3 mr-1" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                                        stroke-width="2" />
                                                </svg> 19:00</span>
                                        </div>
                                    </div>
                                    <div class="flex gap-2">
                                        <a href="/parties/slug"
                                            class="p-3 text-gray-400 hover:text-blue-600 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" />
                                                <path
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                                    stroke-width="2" />
                                            </svg>
                                        </a>
                                        <button
                                            class="p-3 text-gray-400 hover:text-red-600 transition-colors cursor-pointer"
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
                </div>

            </div>
        </main>


    </div>
</x-layout>