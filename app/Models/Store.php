<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $guarded;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function address()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function vendors()
    {
        return $this->hasMany(Vendor::class);
    }
}
