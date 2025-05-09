<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'name', 'slug', 'category_image', 'short_description', 'long_description', 'status'
    ];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function slugHistories()
{
    return $this->hasMany(SlugHistory::class);
}

}
