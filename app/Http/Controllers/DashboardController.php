<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
       
        $orders = $user->orders()->with('items.product', 'address')->get();
        $addresses = $user->addresses()->get();

       
        $statuses = [
            'pending' => ['text' => 'Ожидает оплаты', 'color' => '#eab308', 'bg' => '#fef9c3'],
            'processing' => ['text' => 'В обработке', 'color' => '#06b6d4', 'bg' => '#ecfeff'],
            'shipped' => ['text' => 'Доставляется', 'color' => '#3b82f6', 'bg' => '#eff6ff'],
            'completed' => ['text' => 'Выполнен', 'color' => '#10b981', 'bg' => '#d1fae5'],
            'cancelled' => ['text' => 'Отменен', 'color' => '#ef4444', 'bg' => '#fef2f2'],
        ];

        return view('dashboard.index', compact('user', 'orders', 'addresses', 'statuses'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed'
        ]);

        $user->name = strip_tags($request->name);
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()->back()->with('success', 'Профиль успешно обновлен.');
    }
}
