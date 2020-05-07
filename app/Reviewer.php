<?php

namespace App;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Reviewer
 * @package App
 */
class Reviewer extends Model
{
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
