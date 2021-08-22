<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Review;

class Customer extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'telephone',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

}
