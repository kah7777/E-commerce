<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public function address()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
