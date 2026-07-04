<x-layout title="Новости клуба">
    <div class="max-w-7xl mx-auto min-h-[600px] p-4 lg:py-12">
        <div class="space-y-8">
            @forelse($news as $post)
                <x-news-card :post="$post" />
            @empty
                <x-no-records/>
            @endforelse
        </div>
        {{ $news->links() }}
    </div>
</x-layout>
