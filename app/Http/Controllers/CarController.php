<?php

namespace App\Http\Controllers;

use App\Models\Car;
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
    public function show(Car $cars)
    {
        return $cars;
    }

    public function store(Request $request)
    {
        $car = new Car();
        $car->product()->associate(Product::find($request->input('product')));
        $car->user()->associate(User::find($request->input('user')));

        $car->total_price = $request->input('totalPrice');
        $car->amount = $request->input('amount');
        $car->state = $request->input('state');
        $car->save();

        return $car;
    }
    public function update(Request $request,Car $car)
    {
        $car->category()->associate(Category::find($request->input('category')));
        $car->name = $request->input('name');
        $car->price = $request->input('price');
        $car->image = $request->input('image');
        $car->stock = $request->input('stock');
        $car->description = $request->input('description');
        $car->state = $request->input('state');
        $car->save();

        return $car;
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return $car;
    }
}
