<?php

namespace App;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Theme
 * @package App
 */
class Theme extends Model
{
    /**
     * @var array
     */
    public $fillable = [
      'theme',
      'book_id',
      'font_color',
      'primary_color',
      'secondary_color',
      'cover_image_height',
      'secondary_image_height',
    ];

    /**
     * @return BelongsTo
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
