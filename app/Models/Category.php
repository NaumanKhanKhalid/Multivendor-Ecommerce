<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'category_image', 'short_description', 'long_description', 'status'
    ];

    // Relationship with SubCategory
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function slugHistories()
{
    return $this->hasMany(SlugHistory::class);
}

}
