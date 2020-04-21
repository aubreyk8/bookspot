<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class SocialMedia
 * @package App\Models
 */
class SocialMedia extends Model
{
    /**
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
