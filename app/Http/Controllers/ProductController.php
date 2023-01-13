<?php

namespace App\Http\Controllers;


use App\Models\Catalogue;
use App\Models\Product;
use App\Http\Resources\V1\Product\ProductCollection;
use App\Http\Resources\V1\Product\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products= Product::get();
        return (new ProductCollection($products))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function productMale()
    {
        $products= Product::where('gender_id',4)->get();
        return (new ProductCollection($products))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function productFemale()
    {
        $products= Product::where('gender_id',5)->get();
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
            ->associate(Catalogue::find($request->input('category')));

        $product->gender()
            ->associate(Catalogue::find($request->input('gender')));

        $product->name = $request->input('name');
        $product->price = $request->input('price');

        if ($request->hasFile('image')){
            $product->image = Storage::url($request->file('image')
                ->store('public/image')
            );
        }
        $product->stock = $request->input('stock');
        $product->score = 0;
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
            ->associate(Catalogue::find($request->input('category')));
        $product->catalogue()
            ->associate(Catalogue::find($request->input('gender')));

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->image = $request->input('image');
        $product->stock = $request->input('stock');
        $product->discount = $request->input('discount');
        $product->price_discount = $this->applyDiscount($product);
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

    private function applyDiscount(Product $product)
    {
        $price = $product->price;
        $discount = $product->discount;
        $totalPrice = ($price * $discount)/100;
        return $price-$totalPrice;
    }
}
