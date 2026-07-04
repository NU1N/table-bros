<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartyController extends Controller
{
    public function index(): View
    {
        $parties = Party::with(['master'])
            ->available()
            ->orderBy('datetime', 'asc')
            ->get();

        return view('parties', ['parties' => $parties]);
    }

    public function show(Request $request, string $slug): View
    {
        $party = Party::with(['master', 'participants'])
            ->where('slug', $slug)
            ->available()
            ->firstOrFail();

            $isParticipant = $request->user()
                && $party->participants()->wherePivot('user_id', $request->user()->id)->exists();

        return view('party', ['party' => $party, 'isParticipant' => $isParticipant]);
    }
}
