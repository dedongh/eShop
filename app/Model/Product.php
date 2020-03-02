<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','price','details','quantity'
        ];


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
