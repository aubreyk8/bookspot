<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Order
 * @package App\Models
 */
class Order extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'book_id',
        'email',
        'cancelled',
        'successful',
        'abandoned'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];

    /**
     * @return BelongsTo
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * @return HasOne
     */
    public function sale(): HasOne
    {
        return $this->hasOne(Sale::class);
    }
}
