<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Agency extends Model
{
         /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name',
        'address',
        'nipt',
        'active',
        'image',
    ];

    public function trips()
    {
        return $this->hasMany(Trip::class); //class e lidhur me trips one to many
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
