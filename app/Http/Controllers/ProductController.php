<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products= Product::find();
        return $products;
    }
    public function show(Product $product)
    {
        return $product;
    }

    public function store(Request $request)
    {
        $product = new Product();

        $product->catalogue()
            ->associate(Catalogue::find($request->input('category.id')));
        $product->catalogue()
            ->associate(Catalogue::find($request->input('gender.id')));

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->image = $request->input('image');
        $product->stock = $request->input('stock');
        $product->description = $request->input('description');
        $product->state = $request->input('state');
        $product->save();

        return $product;
    }
    public function update(Request $request,Product $product)
    {
        $product->catalogue()
            ->associate(Catalogue::find($request->input('category.id')));
        $product->catalogue()
            ->associate(Catalogue::find($request->input('gender.id')));

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->image = $request->input('image');
        $product->stock = $request->input('stock');
        $product->description = $request->input('description');
        $product->state = $request->input('state');
        $product->save();

        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return $product;
    }
}
