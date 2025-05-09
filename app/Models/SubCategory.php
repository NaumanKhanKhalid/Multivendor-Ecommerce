<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'subcategory_image',    
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategorySlugHistories()
    {
        return $this->hasMany(SubCategorySlugHistory::class);
    }
}
