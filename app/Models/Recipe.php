<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recipe extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'ingredients',
        'instructions',
        'calories',
        'cooking_time',
        'difficulty',
        'type', // 'regular' atau 'premium'
        'visibility', // 'public' atau 'private'
        'image'
    ];

    protected $casts = [
        'ingredients' => 'array',
        'instructions' => 'array',
        'calories' => 'integer',
        'cooking_time' => 'integer',
    ];

    // Relationship dengan User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Atau jika kolom foreign key berbeda:
    // return $this->belongsTo(User::class, 'author_id');
}
