<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\Product\ProductCollection;
use App\Http\Resources\V1\Product\ProductResource;
use App\Models\Catalogue;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products= Product::find();
        return (new ProductCollection($products))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }
    public function show(Product $product)
    {
        return (new ProductResource($product))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
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

        return (new ProductResource($product))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => 'EL producto a sido creado',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
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

        return (new ProductResource($product))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => 'Producto actualizado',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return (new ProductResource($product))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => 'Producto elminado',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    private function applydiscount(Product $product)
    {
        $price = $product->price;
        $discount = $product->discount;
        $totalPrice = ($price * $discount)/100;
        return $price-$totalPrice;
    }
}
