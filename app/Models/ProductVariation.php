<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



// ProductVariation.php
class ProductVariation extends Model
{
    protected $fillable = ['product_id', 'sku', 'price', 'stock', 'status'];


    public function variationAttributes()
    {
        return $this->hasMany(ProductVariationAttribute::class);
    }


    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class, 'product_variation_attribute_value')
            ->withPivot('attribute_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    // In ProductVariation.php
    public function attributes()
    {
        return $this->hasMany(ProductVariationAttribute::class);
    }


}