<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

    // set
    public function setAddressAttribute($value)
    {
        return $this->attributes['address'] = strtoupper($value);
    }
}
