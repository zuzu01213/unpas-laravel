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
        'is_premium',
    ];

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_premium' => 'boolean',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function isPremium()
    {
        return $this->is_premium;
    }

    public function isAdmin()
    {
        // Adjust the logic based on your business requirements
        return $this->role === 'admin';
    }

    /**
     * Update the user's posts limit.
     *
     * @param int $newLimit
     * @return bool
     */
    public function incrementPostsLimit($incrementBy = 1)
{
    $this->posts_limit += $incrementBy;
    return $this->save();
}
}
