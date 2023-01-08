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
    ];
    // Relationship
    function catalogue(){
        return $this->belongsTo(Catalogue::class);
    }

    function cars(){
        return $this->hasMany(Car::class);
    }

    // Upper
    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = strtoupper($value);
    }

}
