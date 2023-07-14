<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens;
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'phone_number',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function shortenedUrls(): HasMany
    {
        return $this->hasMany(ShortenedUrl::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function hasRole(string $role): bool
    {
        return $this->roles()->where('name', $role)->exists();
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'permission_role', 'user_id', 'permission_id');
    }

    public function hasPermission(string $permission): bool
    {
        return $this->permissions()->where('name', $permission)->exists();
    }
}
