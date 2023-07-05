<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='products';

    protected $fillable=[
        'name',
        'price',
        'image',
        'stock',
        'description',
        'state',
        'price_discount',
    ];

    // Relationship
    function category(){
        return $this->belongsTo(Catalogue::class);
    }

    function carrer(){
        return $this->belongsTo(Catalogue::class);
    }

    function cars(){
        return $this->hasMany(Car::class);
    }

    function favorites(){
        return $this->hasMany(Favorite::class);
    }

    // Upper
    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = strtoupper($value);
    }

}
