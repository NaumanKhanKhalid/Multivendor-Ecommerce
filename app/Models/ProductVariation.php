<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



// ProductVariation.php
class ProductVariation extends Model
{
    protected $fillable = ['product_id', 'sku', 'price', 'stock', 'status'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variationAttributes()
    {
        return $this->hasMany(ProductVariationAttribute::class);
    }

    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class, 'product_variation_attributes', 'product_variation_id', 'attribute_value_id');
    }
}