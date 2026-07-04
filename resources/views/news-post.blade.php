@php
    use Filament\Forms\Components\RichEditor\RichContentRenderer;
@endphp
<x-layout title="{{ $post->title }}">
    <article class="max-w-4xl mx-auto p-4 lg:py-12 min-h-screen">
        <nav class="mb-8">
            <a href="{{ route('news') }}"
                class="inline-flex items-center text-sm font-bold text-primary hover:underline uppercase tracking-wider">
                <x-heroicon-o-chevron-left class="w-5 h-5 mr-3 text-primary" />
                Назад к новостям
            </a>
        </nav>

        <header>
            <div class="flex items-center gap-4 mb-4">
                <time class="text-sm text-white font-medium">
                    {{ $post->created_at->format('d.m.Y h:i') }}
                </time>
            </div>

            <h1 class="text-4xl font-black text-white  mb-6">
                {{ $post->title }}
            </h1>

            <x-sharing />
        </header>

        <div class="prose dark:prose-invert max-w-none my-4">
            {!!
                RichContentRenderer::make($post->content)
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsVisibility('public')
                    ->toHtml()
            !!}
        </div>


    </article>
</x-layout>
