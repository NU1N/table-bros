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
            return redirect()->route('login')->with('error', 'Необходимо авторизоваться');
        }

        if ($party->participants()->where('user_id', $request->user()->id)->exists()) {
            $party->participants()->detach($request->user()->id);
        } else {
            $party->participants()->attach($request->user()->id);
        }

        return back();
    }
}
