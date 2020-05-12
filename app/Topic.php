<?php

namespace App;

use App\Models\Book;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Topic
 * @package App
 */
class Topic extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        'topic',
        'brief_description',
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
