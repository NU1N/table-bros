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
                <div class="flex items-center gap-3 mt-3">
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
                                <h3 class="text-xl font-black text-white tracking-tight mb-8">
                                    Вход
                                </h3>
                                <div class="space-y-3">
                                    <a :href="agreed ? '{{ route('auth.redirect', 'yandex') }}' : '#'"
                                        :class="agreed ? 'cursor-pointer' : 'cursor-not-allowed'"
                                        @click="checkAgreed()"
                                        class="flex items-center justify-center gap-3 w-full py-3.5 px-4 transition-all text-white bg-black rounded-2xl font-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><path d="M2.04 12c0-5.523 4.476-10 10-10 5.522 0 10 4.477 10 10s-4.478 10-10 10c-5.524 0-10-4.477-10-10z" fill="#FC3F1D"/><path d="M13.32 7.666h-.924c-1.694 0-2.585.858-2.585 2.123 0 1.43.616 2.1 1.881 2.959l1.045.704-3.003 4.487H7.49l2.695-4.014c-1.55-1.111-2.42-2.19-2.42-4.015 0-2.288 1.595-3.85 4.62-3.85h3.003v11.868H13.32V7.666z" fill="#fff"/><script xmlns=""/></svg>
                                        Войти с Яндекс ID
                                    </a>
                                </div>
                                <hr class="h-px my-8 bg-neutral-quaternary border-0">
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
