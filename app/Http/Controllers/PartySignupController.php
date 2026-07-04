<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PartySignupController extends Controller
{
    public function __invoke(Request $request, Party $party): RedirectResponse
    {
        if (! $request->user()) {
            return redirect()->back()->with('error', 'Необходимо авторизоваться');
        }

        if ($party->master_id === $request->user()->id) {
            return redirect()->back()->with('error', 'Нельзя учавстовать в своей же партии');
        }

        $isParticipant = $party->participants()->where('user_id', $request->user()->id)->exists();
        if (! $isParticipant && $party->no_spots) {
            return redirect()->back()->with('error', 'Нет свободных мест');
        }

        if ($isParticipant) {
            $party->participants()->detach($request->user()->id);
        } else {
            $party->participants()->attach($request->user()->id);
        }

        return back();
    }
}
