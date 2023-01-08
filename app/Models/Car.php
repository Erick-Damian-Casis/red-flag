<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table='cars';

    protected $fillable=[
        'total_price',
        'amount',
        'state',
    ];

    function user(){
        return $this->belongsTo(User::class);
    }

    function product(){
        return $this->belongsTo(Product::class);
    }
}
