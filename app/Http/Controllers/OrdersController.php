<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function new()
    {
        $time = Carbon::now();
        $order_number = 'ZM-'. rand(1000, 9999).'/'.$time->day.'/'.$time->month.'/'.$time->year;
        return view('order.new', compact('order_number'));
    }

    public function store(Request $request)
    {
        $worker = Auth::user()->name .' '. Auth::user()->surname;

        $order = Order::create([
            'order_number' => $request->order_number,
            'worker' => $worker,
            'nip' => $request->nip,
            'customer_name' => $request->customer_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'price' => $request->price,
            'advance' => $request->advance,
            'customer_note' => $request->customer_note,
            'order_type' => $request->order_type,
            'order_note' => $request->order_note,
            'status' => 'oczekujące',
        ]);

        for ($i = 0; $i <= (sizeof($request->code)-1); $i++)
        {
            OrderItem::create([
                'order_id' => $order->id,
                'code' => $request->code[$i],
                'name' => $request->name[$i],
                'supplier' => $request->supplier[$i],
                'quantity' => $request->quantity[$i],
                'order_item_number' => $request->order_item_number[$i],
                'item_note' => $request->item_note[$i],
            ]);
        }

        return back();
    }

    public function list()
    {
        $orders = Order::orderBy('id','desc')->paginate(20);
        return view('order.list', compact('orders'));
    }

    public function single($id)
    {
        $order = Order::with('item')->where('id', $id)->first();
        return view('order.single', compact('order'));
    }

    public function change_status(Request $request, $id)
    {
        Order::where('id', $id)->update(['status' => $request->status]);
        return back();
    }
}
