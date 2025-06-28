<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $fillable = ['name', 'slug', 'description', 'price', 'type', 'status','sku'];
    protected $fillable = ['name', 'slug', 'sku', 'stock', 'price', 'short_description', 'long_description', 'categories', 'type'];


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

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }
    public function sortedImages()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    // Primary image
    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }





}
