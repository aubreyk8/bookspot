<?php

namespace App\Models;

use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Model
{
    use AsSource, SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];
}
