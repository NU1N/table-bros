@props(['post'])

<a href="/news/slug">
    <article
        class="border border-gray-700 hover:border-blue-600 rounded-3xl overflow-hidden shadow-sm transition bg-gray-800 flex flex-col lg:flex-row mb-6 group cursor-pointer">

        <div class="lg:w-1/3 h-64 lg:h-auto overflow-hidden">
            <img class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500"
                src="{{ asset('default/images/party-preview.png') }}">
        </div>


        <div class="p-6 lg:p-8 flex flex-col flex-grow lg:w-2/3">
            <div class="flex items-center gap-3 mb-4">
                <span class="text-xs font-bold text-gray-400">
                    24.04.2026 19:00
                </span>
            </div>

            <h3 class="text-2xl font-black text-white mb-4 tracking-tighter">
                Нам очень нужен танк, иначе нас разнесут в первой же комнате!
            </h3>

            <p class="text-gray-400 text-base leading-relaxed mb-6 line-clamp-3 lg:line-clamp-4">
                Играем с использованием планшетов для трекинга ХП. Новичкам поможем, но приготовьтесь много думать.
                Берите с
                собой хорошее настроение и что-нибудь к чаю.
            </p>

        </div>
    </article>
</a>