<nav class=" border-b bg-gray-800 border-gray-700 sticky top-0 z-50">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

        <x-logo />

        <ul class="flex flex-wrap justify-center gap-6 md:gap-10 text-sm font-medium text-gray-400">
            <li>
                <a href="{{ route('parties') }}" class="hover:text-blue-600 transition-colors">Расписание
                    партий</a>
            </li>
            <li>
                <a href="{{ route('news') }}" class="hover:text-blue-600 transition-colors">Новости</a>
            </li>
        </ul>

        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse" x-data="{ open: false }">
            <div>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse gap-5">
                    <button @click="loginModal = true"
                        class="flex items-center gap-2 text-white bg-transparent font-bold rounded-xl  py-2.5 transition-all cursor-pointer">
                        Войти
                    </button>
                    <a href="/profile" class="flex text-sm bg-gray-800 rounded-full cursor-pointer">
                        <img class="w-11 h-11 rounded-full object-cover" src="{{ asset('default/images/avatar.png') }}"
                            alt="user photo">
                    </a>
                </div>

                <template x-teleport="body">
                    <div x-show="loginModal" x-transition:opacity
                        class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
                        <div @click.outside="loginModal = false" x-show="loginModal" x-transition:scale.95
                            class="bg-gray-800 w-full max-w-sm rounded-3xl shadow-2xl overflow-hidden border border-gray-700">
                            <div class="p-6 pb-0 flex justify-end">
                                <button @click="loginModal = false"
                                    class="text-gray-400 hover:text-gray-200 cursor-pointer">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                </button>
                            </div>

                            <div class="px-8 pb-10 text-center">
                                <h3 class="text-xl font-black text-white tracking-tight mb-1">
                                    Вход
                                </h3>
                                <p class="text-sm text-gray-400 mb-8">
                                    Выберите способ авторизации
                                </p>

                                <div class="space-y-3">
                                    <a href="/auth/yandex"
                                        class="flex items-center justify-center gap-3 w-full py-3.5 px-4 text-white bg-red-500 rounded-2xl font-bold hover:bg-red-600">

                                        Яндекс
                                    </a>

                                    <a href="/auth/vkontakte"
                                        class="flex items-center justify-center gap-3 w-full py-3.5 px-4 text-white bg-[#0077FF] rounded-2xl font-bold hover:bg-[#0066DD] transition-all">
                                        ВКонтакте
                                    </a>
                                </div>

                                <p class="text-sm text-gray-400 mt-8">
                                    Нажимая на кнопку входа, вы принимаете условия
                                    <a href="{{ route('privacy') }}" class="text-blue-300">Пользовательского
                                        соглашения</a>
                                    и даете согласие на обработку персональных данных
                                </p>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

    </div>
</nav>