<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\Car\CarCollection;
use App\Http\Resources\V1\Car\CarResource;
use App\Models\Car;
use App\Models\Catalogue;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars= Car::get();
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
        $car = new Car();
        $car->product()->associate(Product::find($request->input('product')));
        $car->user()->associate(User::find($request->input('user')));

        $car->size()->associate(Catalogue::find($request->input('size')));
        $car->color()->associate(Catalogue::find($request->input('color')));
        $car->amount = $request->input('amount');
        $car->state = $request->input('state');
        $car->total_price = $this->calculatePrice($car);
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
        $car->product()->associate(Product::find($request->input('product')));
        $car->user()->associate(User::find($request->input('user')));

        $car->size()->associate(Catalogue::find($request->input('size')));
        $car->color()->associate(Catalogue::find($request->input('color')));
        $car->amount = $request->input('amount');
        $car->total_price = $this->calculatePrice($car);
        $car->state = $request->input('state');
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
        $price = $car->product->price;
        $amount = $car->amount;
        return $price * $amount;
    }
}
