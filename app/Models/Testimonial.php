<?php

namespace App\Models;

use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Testimonial
 * @package App
 */
class Testimonial extends Model
{
    use AsSource;

    /**
     * @var array
     */
    protected $fillable = [
        'names',
        'job_title',
        'message',
        'book_id'
    ];
}
