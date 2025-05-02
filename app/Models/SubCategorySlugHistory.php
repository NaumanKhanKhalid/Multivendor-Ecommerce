<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategorySlugHistory extends Model
{
    protected $fillable = [ 'old_slug','changed_by'];


    // Relationship with Category
}
