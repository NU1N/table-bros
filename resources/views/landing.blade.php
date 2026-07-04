<x-layout title="Лого — Твой проводник в мир настольных игр">
    <x-sections.hero />
    @if($partiesToday->isNotEmpty())
        <x-sections.games-today :games="$partiesToday" />
    @endif
    @if($news->isNotEmpty())
        <x-sections.community-news :news="$news" />
    @endif
    <x-sections.gallery />
    <x-sections.masters />
</x-layout>
