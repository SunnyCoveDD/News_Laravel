<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function mainView()
    {
        $orders = Order::where('status_id', 1)->get();
        return view('main', compact('orders'));
    }
    public function noAccess()
    {
        return view('noaccess');
    }

    public function registrationView()
    {
        return view('user.registration');
    }

    public function registrationPost(Request $request)
    {
        $request->validate([
            'login' => 'required|unique:users',
            'password' => 'required|confirmed',
            'success' => 'required',
            'name' => 'required',
        ]);

        $request->merge(['password' => Hash::make($request->password)]);
        User::create($request->all());
        return redirect()->route('auth')->with(['success' => 'Операция регистрации выполнена успешно']);
    }

    public function authorizationView()
    {
        return view('user.authorization');
    }

    public function authorizationPost(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt($request->only('login', 'password'))){
            $request->session()->regenerate(); /*Если убрать, то пользователь не будет авторизовываться сразу после регистрации*/
            return redirect()->route('/');
        }
        return back()->with(['errorLogin' => 'Неверный логин или пароль']);
    }

    public function accountView()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('user.account', compact('orders'));
    }

    public function accountPost(Request $request)
    {

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth');
    }

    public function adminView()
    {
        $statuses = Status::all();
        $orders = Order::all();
        $counts = count(Order::where('status_id', 3)->get());
        return view('user.admin', compact('orders', 'statuses', 'counts'));
    }

    public function adminPost(Request $request)
    {
        $request->validate([
           'id'=>'required',
           'status_id' => 'required'
        ]);
        Order::where('id', $request->id)->update(['status_id' => $request->status_id]);
        return redirect()->route('admin');
    }
}
