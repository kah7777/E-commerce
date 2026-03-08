<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded;

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function wholeProduct()
    {
        return $this->belongsTo(Product::class, 'parent_id');
    }

    public function components()
    {
        return $this->hasMany(Product::class, 'parent_id');
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }
}
