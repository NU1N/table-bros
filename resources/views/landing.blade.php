<x-layout title="Лого — Твой проводник в мир настольных игр">
    <x-sections.hero />
    @if($gamesToday->isNotEmpty())
        <x-sections.games-today :games="$gamesToday" />
    @endif
    <x-sections.community-news :news="$communityNews" />
    <x-sections.gallery />
    <x-sections.masters />
    <x-sections.location />
</x-layout>
