<?php

namespace App\Observers;

use App\Models\Book;
use App\Models\Theme;

/**
 * Class BookObserver
 * @package App\Observers
 */
class BookObserver
{
    /**
     * @param Book $book
     */
    public function created(Book $book)
    {
        Theme::create([
            'book_id' => $book->id
        ]);
    }

    /**
     * @param Book $book
     */
    public function updated(Book $book)
    {
        //
    }

    /**
     * @param Book $book
     */
    public function deleted(Book $book)
    {
        //
    }

    /**
     * @param Book $book
     */
    public function restored(Book $book)
    {
        //
    }

    /**
     * @param Book $book
     */
    public function forceDeleted(Book $book)
    {
        //
    }
}
