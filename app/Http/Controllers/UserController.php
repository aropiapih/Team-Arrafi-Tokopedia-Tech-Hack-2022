<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
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
        $spendPerMonthKey = [];
        foreach ($orderDataPerMonth as $key => $value) {
            array_push($spendPerMonth, $value->sum('amount'));
            array_push($spendPerMonthKey, $key);
        }

        return view('user', [
            'spendPerMonth' => json_encode($spendPerMonth, JSON_NUMERIC_CHECK),
            'spendPerMonthKey' => json_encode($spendPerMonthKey),
            'userShoppingLimit' => $userData['shopping_limit'],
        ]);
    }

    public function updateShoppingLimit(Request $request)
    {
        User::find(Auth::id())->update([
            'shopping_limit' => $request->shopping_limit,
        ]);

        return Redirect::back();
    }
}
