<?php

namespace App\Models;

use App\Topic;
use App\Testimonial;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        'sub_title',
        'promotional_title',
        'description',
        'price',
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

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return HasOne
     */
    public function theme(): HasOne
    {
        return $this->hasOne(Theme::class);
    }

    /***
     * @return HasMany
     */
    public function testimonials(): HasMany
    {
        return $this->hasMany(Testimonial::class);
    }

    /**
     * @return HasMany
     */
    public function reviewer(): HasMany
    {
        return $this->hasMany(Reviewer::class);
    }

    /**
     * @return HasMany
     */
    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }

    /**
     * @return HasMany
     */
    public function order(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
