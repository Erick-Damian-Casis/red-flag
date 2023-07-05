<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\Car\CarResource;
use App\Http\Resources\V1\Product\ProductResource;
use App\Http\Resources\V1\Sale\SaleCollection;
use App\Http\Resources\V1\Sale\SaleResource;
use App\Models\Car;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::get();

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
        $user= Auth::user()->getAuthIdentifier();

        $count = Sale::get()->count();
        $sale = new Sale();
        $sale->invoice = $count+1;
        $sale->total = $this->calculateTotal($user);
        $sale->user()->associate(User::find($user));
        $sale->payment()->associate(Payment::find(1));
        $sale->save();

        $this->invoiceProducts($sale, $user);

        return (new SaleResource($sale))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => 'Compra realizada',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    //calcular el iva

    private function calculateTotal($user){
        $cars = Car::where("user_id",$user)->get();
        $total = 0;
        foreach ($cars as $car){
            $total = $total + $car->total_price;
        }
        $iva = $total * 0.12;
        return $total+$iva;
    }

    private function invoiceProducts($sale, $user){
        $cars= Car::where('user_id', $user)->get();
        foreach ($cars as $car){
            $car->sale()->associate(Sale::find($sale->id));
            $car->save();
        }
        return $cars;
    }

    public function salesByUser()
    {
        $user = Auth::user()->getAuthIdentifier();

        $sales = Sale::where('user_id',$user)->get();

        return (new SaleCollection($sales))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => '',
                'code' => '200',
            ]
        ])->response()->setStatusCode(200);
    }

    public function downloadSale(Sale $sale)
    {
        $cars= Car::where('sale_id', $sale->id)->get();
        $products = [];
        foreach ($cars as $car){
            $product =Product::find($car->product_id);
            array_push($products, $product);
        }
        $user = User::find($sale->user_id);

        $pdf = PDF::loadView('invoice',[
            'cars'=> $cars,
            'user'=>$user,
            'sale'=>$sale,
            'products'=> $products,
            ]);
        return $pdf->stream();
    }
}
