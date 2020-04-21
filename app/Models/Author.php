<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Author
 * @package App\Models
 */
class Author extends Model
{
    /**
     * @return HasMany
     */
    public function socialMedia()
    {
        return $this->hasMany(SocialMedia::class);
    }

    /**
     * @return HasMany
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
