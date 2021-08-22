<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [

        'description',
        'rating',
        'customer_id',
        'trip_id',
    ]
   public function customers()
   {
       return $this->belongsTo(Customer::class);
   }

    public function trips()
    {
        return $this->belongsTo(Trip::class);
    }

}
