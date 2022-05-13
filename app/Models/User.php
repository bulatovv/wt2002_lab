<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    protected $attributes = [
        'is_admin' => False
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function isAdmin() 
    {
        return $this->attributes['is_admin'];  
    }

    public function friends()
    {
        return $this->belongsToMany(
            User::class, "friendships", "user_id", "friend_id"
        );
    }

    public function friendTo(User $user) 
    {
        return $user->friends()->where('friend_id', $this->id)->exists();
    }

    public function items() 
    {
        return $this->hasMany(Item::class);
    }
    
    public function trashedItems() 
    {
        return $this->hasMany(Item::class)->onlyTrashed();
    }
}
