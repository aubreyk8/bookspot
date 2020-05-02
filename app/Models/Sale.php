<?php

namespace App\Models;

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

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
