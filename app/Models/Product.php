<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'price', 'type', 'status'];

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes');
    }

    
    public function variants()
    {
        return $this->hasMany(related: ProductVariation::class);
    }

    public function variantValues()
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function variations()
{
    return $this->hasMany(ProductVariation::class);
}



}
