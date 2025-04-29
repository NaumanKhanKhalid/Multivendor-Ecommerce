<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'password'];

    // Many-to-many relationship with Role model
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    // Check if user has a specific role
    public function hasRole($role)
    {
        return $this->roles->contains('slug', $role);
    }

    public function permissions()
{
    return $this->roles()->with('permissions');
}
}
