<?php

namespace App\Models;

use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Book
 * @package App\Models
 */
class Book extends Model
{
    use AsSource, Attachable;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'slug',
        'isbn',
        'cover_image',
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
