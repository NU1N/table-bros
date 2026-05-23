<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __invoke(): View
    {
        $user = $this->user();
        $stats = $this->stats();
        $registrations = $this->registrations();

        return view('profile', [
            'user' => $user,
            'stats' => $stats,
            'registrations' => $registrations,
        ]);
    }

    private function user(): array
    {
        return [
            'name' => 'Алексей Иванов',
            'avatar' => asset('default/images/avatar.png'),
        ];
    }

    private function stats(): array
    {
        return [
            ['label' => 'Сыграно партий', 'value' => 42],
            ['label' => 'Часов сыграно', 'value' => 128],
            ['label' => 'Любимый жанр', 'value' => 'Стратегия'],
            ['label' => 'В клубе', 'value' => '6 мес.'],
        ];
    }

    private function registrations(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Мрачная гавань',
                'date' => '26.04.2026',
                'time' => '19:00',
                'status' => 'confirmed',
            ],
            [
                'id' => 2,
                'title' => 'Кодовое имя: Спринтер',
                'date' => '27.04.2026',
                'time' => '18:00',
                'status' => 'pending',
            ],
            [
                'id' => 3,
                'title' => 'Гвинт: Турнир',
                'date' => '28.04.2026',
                'time' => '20:00',
                'status' => 'confirmed',
            ],
            [
                'id' => 4,
                'title' => 'Каркассон: Новые земли',
                'date' => '02.05.2026',
                'time' => '17:00',
                'status' => 'cancelled',
            ],
        ];
    }
}
