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
        'description',
        'iva',
        'sale_at',
    ];

    function car(){
        return $this->belongsTo(Car::class);
    }

    // Upper
    public function setDescriptionAttribute($value)
    {
        return $this->attributes['description'] = strtoupper($value);
    }


}
