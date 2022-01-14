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

        $orderData = $user->order()->get();

        $orderDataPerMonth = $user->order()->get()->groupBy(function($val) {
            return Carbon::parse($val->created_at)->format('m');
        });

        return [
            'userData' => $userData,
            'orderData' => $orderData,
            'orderDataPerMonth' => $orderDataPerMonth,
        ];
    }
}
