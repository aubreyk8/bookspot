<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sale
 * @package App\Models
 */
class Sale extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        'book_id',
        'user_id',
        'price',
        'order_id',
        'link',
        'downloads',
        'expires_on'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'expires_on',
    ];

    /**
     * @return BelongsTo
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * @return BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
