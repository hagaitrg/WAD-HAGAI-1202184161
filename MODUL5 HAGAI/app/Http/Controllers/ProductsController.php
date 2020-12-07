<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function insert(Request $request)
    {
        $img = time() . '.' . $request->img->extension();

        $request->img->move(public_path(), $img);

        Products::insert([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'img_path' => $img
        ]);

        return redirect();
    }

    public function index()
    {
        $products = Products::all();

        return view(compact('products'));
    }

    public function edit($id)
    {
        $product = Products::find($id);

        return view(compact('product'));
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

            $request->imgChange->move(public_path(), $img);
            Products::where('id', $id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'stock' => $request->stock,
                'img_path' => $img
            ]);
        }

        return redirect();
    }

    public function destroy($id)
    {
        Products::where('id', $id)->delete();

        return redirect();
    }
}
