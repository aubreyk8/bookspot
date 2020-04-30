<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Screen\AsSource;

/**
 * Class Reviews
 * @package App\Models
 */
class Reviews extends Model
{
    use AsSource;

    /**
     * @return BelongsTo
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
