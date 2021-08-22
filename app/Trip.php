<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'date',
        'duration',
        'destination',
        'price',
        'max_participiants',
        'payemnt_due_date',
        'details',
        'agency_id'
    ];

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function agencies(){
        return $this->belongsTo(Agency::class);
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class,'customers_trips');
    }


}
