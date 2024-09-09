<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    use HasFactory;
    protected $table='catalogues';

    protected $fillable=[
        'name',
        'type'
    ];

    // Set
    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = strtoupper($value);
    }

    public function setTypeAttribute($value)
    {
        return $this->attributes['type'] = strtoupper($value);
    }
}
