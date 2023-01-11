<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\Sale\SaleCollection;
use App\Http\Resources\V1\Sale\SaleResource;
use App\Models\Car;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::find();
        return (new SaleCollection($sales))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function show(Sale $sale)
    {
        return (new SaleResource($sale))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function store(Request $request)
    {
        $user= 1;
        $sale = new Sale();
        $sale->car()->associate(Car::find($request->input('car.id')));
        $sale->invoice = $request->input('invoice');
        $this->discountStock($sale);

        $sale->total = $this->calculateTotal($user);
        $sale->save();
        return (new SaleResource($sale))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => 'Compra realizada',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    private function calculateTotal($user){
        $cars = Car::where("user_id",1)->get();
        $total = 0;
        foreach ($cars as $car){
            $total = $total + $car->total_price;
        }
        $iva = $total * 0.12;
        return $total-$iva;
    }

    private function discountStock($sale){
        $productDiscount = Product::where('id', $sale->car->product_id)->first();
        $productDiscount->stock = $productDiscount->stock-1;
        $productDiscount->save();
    }
}
