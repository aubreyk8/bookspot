<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sale
 * @package App\Models
 */
class Sale extends Model
{
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
}
