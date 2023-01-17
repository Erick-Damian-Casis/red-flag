<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table='sales';

    protected $fillable=[
        'invoice',
        'total',
    ];

    function payment(){
        return $this->belongsTo(Payment::class);
    }
    function cars(){
        return $this->hasMany(Car::class);
    }
}
