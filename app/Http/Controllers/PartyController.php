<?php

namespace App\Http\Controllers;

use App\Models\Party;
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

    public function show(string $slug): View
    {
        $party = Party::where('slug', $slug)->available()->firstOrFail();

        return view('party', ['party' => $party]);
    }
}
