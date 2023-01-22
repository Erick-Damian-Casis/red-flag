<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'photo_profile',
    ];
    // Relationship

    function cars(){
        return $this->hasMany(Car::class);
    }

    function sales(){
        return $this->hasMany(Sale::class);
    }

    // set
    public function setAddressAttribute($value)
    {
        return $this->attributes['address'] = strtoupper($value);
    }
}
