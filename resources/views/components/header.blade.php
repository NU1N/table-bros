<nav class="border-b bg-secondary sticky top-0 z-100 ">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 min-h-24">

        <x-logo />

        <ul class="flex flex-wrap justify-center gap-6 md:gap-10 text-sm font-medium text-white">
            <li>
                <a href="{{ route('parties') }}" class="hover:text-gray-200">Расписание партий</a>
            </li>
            <li>
                <a href="{{ route('news') }}" class="hover:text-gray-200">Новости</a>
            </li>
            @if( auth()->user()?->is_admin )
                <li>
                    <a href="{{ route('filament.admin.resources.parties.index') }}" class="hover:text-gray-200">Админка</a>
                </li>
            @endif

        </ul>

        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

            @auth
                <div class="flex items-center gap-3">
                    <a href="{{route('profile')}}" class="flex text-sm bg-gray-800 rounded-full hover:bg-gray-700 transition-colors cursor-pointer">
                        <img class="w-11 h-11 rounded-full object-cover"
                            src="{{ auth()->user()?->avatar_url }}"
                            alt="user photo">
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="text-white text-sm font-bold hover:text-gray-200 transition-colors">
                            Выйти
                        </button>
                    </form>
                </div>
            @else
                <button @click="loginModal = true"
                    class="flex items-center gap-2 text-white bg-transparent font-bold rounded-xl py-2.5 transition-all cursor-pointer hover:text-gray-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    Войти
                </button>

                <template x-teleport="body">
                    <div x-show="loginModal" x-transition:opacity x-cloak
                        class="fixed inset-0 z-[100] flex items-center justify-center bg-black/60 backdrop-blur-sm p-4">
                        <div @click.outside="loginModal = false" x-show="loginModal" x-transition:scale.95
                            x-data="{
                                agreed: false,
                                highlight: false,
                                checkAgreed() {
                                    if (!this.agreed) {
                                        this.highlight = true;
                                        setTimeout(() => this.highlight = false, 2500);
                                        this.preventDefault();
                                    }
                                },
                            }"
                            @keydown.escape="loginModal = false"
                            class="bg-secondary-medium border-secondary-light w-full max-w-sm rounded-3xl shadow-2xl overflow-hidden border relative">
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
                                <p class="text-sm text-white mb-6">
                                    Выберите способ авторизации
                                </p>

                                <div class="space-y-3">
                                    <a :href="agreed ? '{{ route('auth.redirect', 'yandex') }}' : '#'"
                                        :class="agreed ? 'cursor-pointer' : 'cursor-not-allowed'"
                                        @click="checkAgreed()"
                                        class="flex items-center justify-center gap-3 w-full py-3.5 px-4 transition-all text-white bg-red-500 rounded-2xl font-bold hover:bg-red-600 ">
                                        Яндекс
                                    </a>

                                    <a :href="agreed ? '{{ route('auth.redirect', 'vkontakte') }}' : '#'"
                                        :class="agreed ? 'cursor-pointer' : 'cursor-not-allowed'"
                                        @click="checkAgreed()"
                                        class="flex items-center justify-center gap-3 w-full py-3.5 px-4 transition-all text-white bg-[#0077FF] rounded-2xl font-bold hover:bg-[#0066DD]">
                                        ВКонтакте
                                    </a>
                                </div>

                                <label :class="highlight ? 'text-red-500 animate-pulse [animation-duration:200ms] [animation-iteration-count:2]' : 'text-white'"
                                       class="flex items-start gap-3 mt-6 text-left cursor-pointer group">
                                    <input type="checkbox" x-model="agreed"
                                           :class="highlight ? 'bg-red-300' : ''"
                                        class="mt-1 w-4 h-4 rounded border-gray-600 bg-gray-700 text-primary focus:ring-primary focus:ring-offset-gray-800 cursor-pointer flex-shrink-0">
                                    <span class="text-sm  leading-snug flex-1">
                                        Я ознакомился(а) и принимаю условия
                                        <a href="{{ route('privacy') }}" target="_blank"
                                           :class="highlight ? 'text-red-500' : ''"
                                            class="text-primary hover:underline font-bold">
                                            Политики конфиденциальности
                                        </a>
                                        и согласия на обработку персональных данных
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </template>
            @endauth
        </div>

    </div>
</nav>
