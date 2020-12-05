<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function insert(Request $request)
    {
        $img = time() . '.' . $request->img->extension();

        $request->img->move(public_path('img/'), $img);

        Products::insert([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'img_path' => $img
        ]);

        return redirect('/product');
    }

    public function index()
    {
        $products = Products::all();

        return view('product', compact('products'));
    }

    public function edit($id)
    {
        $product = Products::find($id);

        return view('update', compact('product'));
    }

    public function update($id, Request $request)
    {
        if ($request->imgChange == null) {
            Products::where('id', $id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'stock' => $request->stock,
            ]);
        } else {
            $img = time() . '.' . $request->imgChange->extension();

            $request->imgChange->move(public_path('img/'), $img);
            Products::where('id', $id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'stock' => $request->stock,
                'img_path' => $img
            ]);
        }

        return redirect('/product');
    }

    public function destroy($id)
    {
        Products::where('id', $id)->delete();

        return redirect('/product');
    }
}
