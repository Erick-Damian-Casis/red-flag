<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Catalogue;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars= Car::find();
        return $cars;
    }
    public function show(Car $car)
    {
        return $car;
    }

    public function store(Request $request)
    {
        $car = new Car();

        $car->product()->associate(Product::find($request->input('product.id')));
        $car->user()->associate(User::find($request->input('user.id')));

        $car->size()->associate(Catalogue::find($request->input('size.id')));
        $car->color()->associate(Catalogue::find($request->input('color.id')));
        $car->amount = $request->input('amount');
        $car->total_price = $this->calculatePrice($car);
        $car->state = $request->input('state');
        $car->save();

        return $car;
    }
    public function update(Request $request,Car $car)
    {
        $car->product()->associate(Product::find($request->input('product.id')));
        $car->user()->associate(User::find($request->input('user.id')));

        $car->size()->associate(Catalogue::find($request->input('size.id')));
        $car->color()->associate(Catalogue::find($request->input('color.id')));
        $car->amount = $request->input('amount');
        $car->total_price = $this->calculatePrice($car);
        $car->state = $request->input('state');
        $car->save();

        return $car;
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return $car;
    }

    private function calculatePrice($car){
        $price = $car->product->price;
        $amount = $car->amount;
        return $price * $amount;
    }
}
