<x-layout title="Новость">
    <article class="max-w-4xl mx-auto p-4 lg:py-12">
        <nav class="mb-8">
            <a href="{{ route('news') }}"
                class="inline-flex items-center text-sm font-bold text-primary hover:underline uppercase tracking-wider">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M15 19l-7-7 7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Назад к новостям
            </a>
        </nav>

        <header>
            <div class="flex items-center gap-4 mb-4">
                <time class="text-sm text-white font-medium">
                    14.04.2026 19:00
                </time>
            </div>

            <h1 class="text-4xl font-black text-white  mb-6">
                Нам очень нужен танк, иначе нас разнесут в первой же комнате!
            </h1>
            <x-sharing />
        </header>


        <div class="my-5 rounded-3xl overflow-hidden shadow-2xl">
            <img class="w-full object-cover max-h-[500px]" src="{{ asset('default/images/party-preview.png') }}">
        </div>

        <div class="prose prose-invert max-w-none text-white leading-relaxed font-serif_ (или оставить дефолтный)">
            Играем с использованием планшетов для трекинга ХП. Новичкам поможем, но приготовьтесь много думать.
            Берите с
            собой хорошее настроение и что-нибудь к чаю.

            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi aut possimus adipisci magnam sapiente veniam
            voluptas repudiandae consequuntur eligendi asperiores. Ipsum vero nulla, ex sit alias accusantium?
            Quibusdam, minus magni.
        </div>


    </article>
</x-layout>