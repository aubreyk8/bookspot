<?php

namespace App\Models;

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
      'icon_color',
      'cover_image_height',
      'cover_image_width',
      'secondary_image_height',
      'secondary_image_width'
    ];

    /**
     * @return BelongsTo
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
