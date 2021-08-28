<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'telephone',
        'age'
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function trips()
    {
        return $this->belongsToMany(Trip::class,'customers_trips');
    }
}
