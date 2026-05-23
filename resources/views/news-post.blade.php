<x-layout title="{{ $post['title'] }}">
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
                    {{ $post['date'] }} {{ $post['time'] }}
                </time>
            </div>

            <h1 class="text-4xl font-black text-white  mb-6">
                {{ $post['title'] }}
            </h1>
            <x-sharing />
        </header>


        <div class="my-5 rounded-3xl overflow-hidden shadow-2xl">
            <img class="w-full object-cover max-h-[500px]" src="{{ $post['image'] }}">
        </div>

        <div class="prose prose-invert max-w-none text-white leading-relaxed font-serif">
            {{ $post['content'] }}
        </div>


    </article>
</x-layout>
