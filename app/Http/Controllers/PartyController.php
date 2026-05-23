<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PartyController extends Controller
{
    public function index(): View
    {
        $parties = $this->parties();

        return view('parties', [
            'parties' => $parties,
        ]);
    }

    public function show(string $slug): View
    {
        $party = $this->findParty($slug);

        return view('party', [
            'party' => $party,
        ]);
    }

    private function parties(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Мрачная гавань',
                'slug' => 'gloomy-harbor',
                'game' => 'D&D 5E',
                'date' => '26.04.2026',
                'time' => '19:00',
                'price' => '500 ₽',
                'description' => 'Огромное кооперативное приключение. Ищем опытных наемников для прохождения кампании.',
                'host' => 'DungeonMaster',
                'hostAvatar' => asset('default/images/avatar.png'),
                'avatar' => asset('default/images/avatar.png'),
                'spots' => 1,
                'maxSpots' => 4,
                'full' => true,
            ],
            [
                'id' => 2,
                'title' => 'Кодовое имя: Спринтер',
                'slug' => 'codename-sprinter',
                'game' => 'Codenames',
                'date' => '27.04.2026',
                'time' => '18:00',
                'price' => '300 ₽',
                'description' => 'Классическая командная игра на ассоциации. Отлично подходит для новичков и опытных игроков.',
                'host' => 'GameMaster',
                'hostAvatar' => asset('default/images/avatar.png'),
                'avatar' => asset('default/images/avatar.png'),
                'spots' => 2,
                'maxSpots' => 6,
                'full' => false,
            ],
            [
                'id' => 3,
                'title' => 'Гвинт: Турнир',
                'slug' => 'gwent-tournament',
                'game' => 'Gwent',
                'date' => '28.04.2026',
                'time' => '20:00',
                'price' => '400 ₽',
                'description' => 'Еженедельный турнир по Гвенту. Принесите свои колоды и сразитесь за призы!',
                'host' => 'CardKing',
                'hostAvatar' => asset('default/images/avatar.png'),
                'avatar' => asset('default/images/avatar.png'),
                'spots' => 6,
                'maxSpots' => 8,
                'full' => false,
            ],
            [
                'id' => 4,
                'title' => 'Каркассон: Новые земли',
                'slug' => 'carcassonne-new-lands',
                'game' => 'Carcassonne',
                'date' => '29.04.2026',
                'time' => '17:00',
                'price' => '250 ₽',
                'description' => 'Стратегическая игра на построение средневекового королевства. Идеально для вечеринки!',
                'host' => 'TileMaster',
                'hostAvatar' => asset('default/images/avatar.png'),
                'avatar' => asset('default/images/avatar.png'),
                'spots' => 3,
                'maxSpots' => 5,
                'full' => false,
            ],
        ];
    }

    private function findParty(string $slug): array
    {
        $parties = $this->parties();

        foreach ($parties as $party) {
            if ($party['slug'] === $slug) {
                return $party;
            }
        }

        abort(404);
    }
}
