<?php

namespace App\Models;

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
        'google_id',
        'role',
        'avatar',
        'phone',
        'bio',
        'birthdate',
        'location',
        'social_links',
        'profile_completed',
        'step_completed',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'social_links' => 'array',
        'birthdate' => 'date',
        'profile_completed' => 'boolean',
    ];

    public function interests()
    {
        return $this->belongsToMany(Interest::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class)->withPivot('is_admin')->withTimestamps();
    }

    public function createdGroups()
    {
        return $this->hasMany(Group::class, 'creator_id');
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
