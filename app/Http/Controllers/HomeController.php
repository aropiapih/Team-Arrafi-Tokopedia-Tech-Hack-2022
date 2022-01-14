<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function home(): Factory|View|Application
    {
        /** @var User $user */
        $user = Auth::user();
        $exceeded_limit = $user->spendThisMonth() > $user->shopping_limit ? 1 : 0;

        if (!$user->notif_limit && $exceeded_limit) {
            $user->notif_limit = true;
            $user->save();
        }

        return view('home')
            ->with('exceeded_limit', $exceeded_limit);
    }
}
