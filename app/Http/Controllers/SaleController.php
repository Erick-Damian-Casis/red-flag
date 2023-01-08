<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::find();
        return $sales;
    }

    public function show(Sale $sale)
    {
        return $sale;
    }

    public function Store(Request $request)
    {
        $sale = new Sale();
        $sale->car()->associate(Car::find($request->input('car')));
        $sale->sale_at = now();
        $sale->iva = 12;
        $sale->description = $request->input('description');
        $sale->save();
        return $sale;
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return $sale;
    }
}
