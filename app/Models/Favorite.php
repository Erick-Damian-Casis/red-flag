<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $table='favorites';

    protected $fillable=[];

    function product(){
        return $this->belongsTo(Product::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
}
