<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

    // Many-to-many relationship with Permission model
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }

    // Many-to-many relationship with User model
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }
}
