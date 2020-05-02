<?php

namespace App\Models;

use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Book
 * @package App\Models
 */
class Book extends Model
{
    use AsSource;

    protected $fillable = [
        'title',
        'category',
        'slug',
        'isbn',
        'user_id'
    ];

    /**
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }
}
