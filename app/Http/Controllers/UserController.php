<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $user = User::find(Auth::id());

        $userData = [
            'name' => $user->name,
            'email' => $user->email,
            'no_hp' => $user->no_hp,
            'address' => $user->address,
            'shopping_limit' => $user->shopping_limit,
        ];

        $orderDataPerMonth = $user->orderPerMonth();

        $spendPerMonth = [];
        foreach ($orderDataPerMonth as $key => $value) {
            $spendPerMonth[$key] = $value->sum();
        }

        return [
            'userData' => $userData,
            'spendPerMonth' => $spendPerMonth,
        ];
    }

    public function updateShoppingLimit(Request $request) {
        User::find(Auth::id())->update([
            'shopping_limit' => $request->shopping_limit,
        ]);

        return null;
    }
}
