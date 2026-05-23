<x-layout title="Новости клуба">
    <div class="max-w-7xl mx-auto p-4 lg:py-12">
        <div class="space-y-8">
            @forelse($news as $post)
                <x-news-card :post="$post" />
            @empty
                <div class="py-20 text-center border-4 border-dashed border-gray-100 rounded-3xl">
                    <p class="text-gray-400 text-xl font-bold uppercase italic">Тишина... пока новостей нет</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
