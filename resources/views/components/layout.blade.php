<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'BoardGameSync' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-900" x-data="{ loginModal: false }">
    <x-header />

    <main>
        {{ $slot }}
    </main>
    <x-footer />


    <div x-data="{ 
        showCookie: false,
        init() {
            if (!localStorage.getItem('cookie_accepted')) {
                setTimeout(() => { this.showCookie = true }, 1000);
            }
        },
        accept() {
            localStorage.setItem('cookie_accepted', 'true');
            this.showCookie = false;
        }
    }" x-show="showCookie" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-10"
        class="fixed bottom-4 left-4 right-4 md:left-auto md:right-8 md:max-w-sm z-[100]" style="display: none;">
        <div class="bg-gray-800 border border-gray-700 shadow-2xl rounded-3xl p-6 relative overflow-hidden">
            <div
                class="absolute -top-6 -right-6 w-16 h-16 bg-blue-900/20 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-blue-600 mt-4 mr-4" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M11 3a1 1 0 10-2 0 1 1 0 002 0zM4.5 5A.5.5 0 004 5.5V8a.5.5 0 00.5.5h4a.5.5 0 00.5-.5V5.5a.5.5 0 00-.5-.5h-4zM10 8a1 1 0 102 0V6a1 1 0 10-2 0v2zM5 10a1 1 0 011-1h1a1 1 0 110 2H6a1 1 0 01-1-1zM9 13a1 1 0 011-1h1a1 1 0 110 2h-1a1 1 0 01-1-1zM5 13a1 1 0 011-1h1a1 1 0 110 2H6a1 1 0 01-1-1zM9 16a1 1 0 011-1h1a1 1 0 110 2h-1a1 1 0 01-1-1zM5 16a1 1 0 011-1h1a1 1 0 110 2H6a1 1 0 01-1-1zM14 11a1 1 0 100-2 1 1 0 000 2zM14 14a1 1 0 100-2 1 1 0 000 2zM14 17a1 1 0 100-2 1 1 0 000 2z">
                    </path>
                </svg>
            </div>

            <div class="relative">
                <h4 class="text-lg font-black text-white uppercase tracking-tighter mb-2 ">
                    Мы
                    используем куки</h4>
                <p class="text-sm text-gray-400 mb-6 leading-relaxed">
                    Коротко: они нужны, чтобы вы не вылетали из аккаунта и сайт работал быстрее. Согласны? 🍪
                </p>

                <div class="flex items-center gap-3">
                    <button @click="accept()"
                        class="flex-1 bg-blue-600 text-white text-sm font-bold py-3 rounded-xl hover:opacity-90 transition-all uppercase tracking-widest cursor-pointer">
                        Ок, погнали
                    </button>
                    <a href="{{ route('privacy') }}"
                        class="text-xs font-bold text-gray-400 hover:text-blue-600 uppercase transition-colors">Подробнее</a>
                </div>
            </div>
        </div>
    </div>


    <div x-data="{ 
        showButton: false,
        scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    }" @scroll.window="showButton = (window.pageYOffset > 500)" class="fixed bottom-8 right-8 z-40">
        <button x-show="showButton" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-10 scale-90"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-10 scale-90" @click="scrollToTop"
            class="flex items-center cursor-pointer justify-center w-14 h-14 bg-gray-800/80 backdrop-blur-md text-blue-600 border border-gray-700 rounded-full shadow-2xl hover:bg-blue-600 hover:text-white transition-all group"
            aria-label="Наверх" style="display: none;">
            <svg class="w-6 h-6 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 15l7-7 7 7"></path>
            </svg>
        </button>
    </div>

</body>

</html>