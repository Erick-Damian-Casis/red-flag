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

        $product->category()
            ->associate(Catalogue::find($request->input('category.id')));

        $product->gender()
            ->associate(Catalogue::find($request->input('gender.id')));

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->image = $request->input('image');
        $product->stock = $request->input('stock');
        $product->score = $request->input('score');
        $product->discount = $request->input('discount');
        $product->price_discount = $this->applydiscount($product);
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
        $product->score = $request->input('score');
        $product->discount = $request->input('discount');
        $product->price_discount = $this->applydiscount($product);
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

    private function applydiscount(Product $product)
    {
        $price = $product->price;
        $discount = $product->discount;
        $totalPrice = ($price * $discount)/100;
        return $price-$totalPrice;
    }
}
