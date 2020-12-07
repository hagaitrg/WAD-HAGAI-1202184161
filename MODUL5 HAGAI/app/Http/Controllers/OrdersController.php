<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Products::get();

        return view(compact('orders'));
    }

    public function show($id)
    {
        $order = Products::find($id);

        return view(compact('order'));
    }

    public function create(Request $request)
    {
        $quantity = $request->quantity;
        $price = $request->price;

        $amount = $price * $quantity;

        $stock = Products::find($request->product_id)->stock;

        Products::where('id', $request->product_id)->update([
            'stock' => $stock - $quantity
        ]);

        Orders::insert([
            'product_id' => $request->product_id,
            'amount' => $amount,
            'buyer_name' => $request->buyerName,
            'buyer_contact' => $request->buyerContact,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('' . $request->product_id);
    }

    public function history()
    {
        // $getInfo = Products::with(['hasManyOrder'])->get();
        $getInfo = Orders::with(['belongsToProduct'])->get();
        // dd($getInfo[0]->belongsToProduct->name);
        return view(compact('getInfo'));
    }
}
