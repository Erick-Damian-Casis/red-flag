<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\Car\CarCollection;
use App\Http\Resources\V1\Car\CarResource;
use App\Models\Car;
use App\Models\Catalogue;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function index()
    {
        $user= Auth::user()->getAuthIdentifier();
        $cars= Car::where('user_id',$user)->get();
        return (new CarCollection($cars))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function show(Car $car)
    {
        return (new CarResource($car))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function store(Request $request)
    {
        $user= Auth::user()->getAuthIdentifier();
        $car = new Car();
        $car->product()->associate(Product::find($request->input('product')));
        $car->user()->associate(User::find($user));
        $car->size()->associate(Catalogue::find($request->input('size')));
        $car->color()->associate(Catalogue::find($request->input('color')));
        $car->amount = $request->input('amount');
        $car->total_price = $this->calculatePrice($car);
        $this->discountStock($car);
        $car->save();

        return (new CarResource($car))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => 'El producto a sido agregado',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function update(Request $request,Car $car)
    {
        $car->size()->associate(Catalogue::find($request->input('size')));
        $car->color()->associate(Catalogue::find($request->input('color')));
        $car->amount = $request->input('amount');
        $car->total_price = $this->calculatePrice($car);
        $car->save();

        return (new CarResource($car))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => 'El producto a sido actualizado',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return (new CarResource($car))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => 'El producto a sido eliminado',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    private function calculatePrice($car){
        $price = $car->product->price_discount;
        $amount = $car->amount;
        return $price * $amount;
    }

    private function discountStock($car){
        $amount = $car->amount;
        $product = Product::find($car->product_id);
        $product->stock = $product->stock - $amount;
        $product->save();
    }
}
