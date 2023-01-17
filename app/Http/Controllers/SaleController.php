<?php

namespace App\Http\Controllers;

use App\Http\Resources\V1\Sale\SaleCollection;
use App\Http\Resources\V1\Sale\SaleResource;
use App\Models\Car;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function index()
    {
        $user= Auth::user()->getAuthIdentifier();
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
//        return $sale->car->user->name;
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
//        $this->discountStock($user);
        $sale->total = $this->calculateTotal($user);
        $sale->payment()->associate(Payment::find($request->input('payment')));
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

    private function calculateTotal($user){
        $cars = Car::where("user_id",$user)->get();
        $total = 0;
        foreach ($cars as $car){
            $total = $total + $car->total_price;
        }
        $iva = $total * 0.12;
        return $total-$iva;
    }

    private function invoiceProducts($sale, $user){
        $cars= Car::where('user_id', $user)->get();
        foreach ($cars as $car){
            $car->sale()->associate(Sale::find($sale->id));
            $car->save();
        }
        return $cars;
    }

//    private function discountStock($user){
//
//    }

    public function salesByUser()
    {
        $user = Auth::user()->getAuthIdentifier();

        $sales = Sale::get();

//        $participant = Participant::where('user_id', $request->user()->id)->first();
//        $registration = Registration::where('detail_planification_id',$detailPlanification->id)
//            ->where('participant_id',$participant->id)
//            ->paginate($request->input('per_page'));;

        return (new SaleCollection($sales))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => '',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }
}
