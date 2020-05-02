<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Visitor
 * @package App\Models
 */
class Visitor extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'ip',
        'continent',
        'continent_code',
        'country',
        'country_code',
        'region_name',
        'region',
        'lat',
        'lon',
        'mobile',
        'proxy',
        'book_id',
    ];

    /**
     * @return BelongsTo
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
