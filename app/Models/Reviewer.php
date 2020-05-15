<?php

namespace App\Models;

use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Reviewer
 * @package App
 */
class Reviewer extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        'image',
        'names',
        'job_title',
        'facebook',
        'twitter',
        'message',
        'book_id'
    ];

    /**
     * @return BelongsTo
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
