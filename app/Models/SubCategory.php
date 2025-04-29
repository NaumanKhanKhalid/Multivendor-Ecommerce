<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'name', 'slug', 'subcategory_image', 'short_description', 'long_description', 'status'
    ];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
