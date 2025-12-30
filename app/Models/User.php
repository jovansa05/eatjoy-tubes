<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nickname',
        'username',
        'email',
        'password',
        'current_weight',
        'target_weight',
        'subscription_plan',
        'subscription_ends_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'current_weight' => 'float',
        'target_weight' => 'float',
        'subscription_ends_at' => 'datetime'
    ];

    // ========== HELPER METHODS ==========

    public function isPremium()
    {
        return in_array($this->subscription_plan, ['starter', 'starter_plus']);
    }

    public function isStarterPlus()
    {
        return $this->subscription_plan === 'starter_plus';
    }

    public function isStarter()
    {
        return $this->subscription_plan === 'starter';
    }

    public function isFree()
    {
        return $this->subscription_plan === 'free';
    }

    // ========== RELATIONSHIPS ==========

    // Relationship dengan Recipe
    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class, 'user_id');
    }
}
