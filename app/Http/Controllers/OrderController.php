<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function add()
    {
        $categories = Category::all();
        return view('orders.create', compact('categories'));
    }

    public function addPost(Request $request)
    {
        $request->validate([
           'news' => 'required',
           'description' => 'required',
           'category_id' => 'required',
           'photo' => 'required|file|mimes:jpg,png,bmp|max:10240'
        ]);
        $name_photo = explode('/', $request->file('photo')->store('public'))[1];
        $data = [
            'photo'=> $name_photo,
            'user_id' => Auth::id(),
            'status_id' => 3,
        ];
        $data += $request->only('news', 'description', 'category_id');
        Order::create($data);
        return redirect()->route('acc');
    }

    public function deleteView(Order $order)
    {
        if(Auth::user()->isAdmin){
            return view('orders.delete', compact('order'));
        }
        elseif($order->user_id != Auth::id() ||$order->status_id != 3){
            return redirect()->route('acc');
        }
        return view('orders.delete', compact('order'));
    }

    public function deletePost(Order $order)
    {
        $order->delete();
        return redirect()->route('acc');
    }

    public function updateView(Order $order)
    {
        $categories = Category::all();
        $statuses = Status::all();
        $orderCategory= Category::find($order->category_id);
        $orderStatus = Status::find($order->status_id);
        if(Auth::user()->isAdmin){
            return view('orders.update', compact('order', 'categories', 'statuses', 'orderCategory', 'orderStatus'));
        }
        elseif ($order->user_id != Auth::id() || $order->status_id !=3)
            return redirect()->route('acc');
        return view('orders.update', compact('order', 'categories', 'statuses', 'orderCategory', 'orderStatus'));
    }

    public function updatePost(Order $order, Request $request)
    {
        $order -> news = $request->input('news');
        $order -> description = $request->input('description');
        $order -> category_id = $request->input('category_id');
        if($request->photo_new)
        {
            $order -> photo_new = explode('/', $request->file('photo_new')->store('public'))[1];
        }
        if(Auth::user()->isAdmin)
        {
            $order -> status_id = $request -> input('status_id');
        }
        $order->save();
        return redirect()->route('acc');
    }

}
