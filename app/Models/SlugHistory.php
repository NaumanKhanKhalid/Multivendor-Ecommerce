<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlugHistory extends Model
{
    protected $fillable = [ 'old_slug','changed_by'];
}
