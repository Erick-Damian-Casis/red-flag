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
        $sale = new Sale();
        $sale->car()->associate(Car::find($request->input('car.id')));
        $sale->invoice = $request->input('invoice');
        $sale->total = $this->calculateTotal($sale);
        $this->discountStock($sale);
        $sale->save();
        return (new SaleResource($sale))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => 'Compra realizada',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    private function calculateTotal($sale){
        $cars= Car::where('user_id',$sale->car_id)->select($sale->car_id->state, true)->get();
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
