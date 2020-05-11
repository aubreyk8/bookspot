<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Support\Facades\Session;

/**
 * Class BookLocator
 * @package App\Services
 */
class BookLocator
{
    /**
     * @param int $id
     */
    public function init(int $id): void
    {
        Session::put('book_id', $id);
    }

    /**
     * @return bool
     */
    public function hasBook(): bool
    {
        return Session::has('book_id');
    }

    public function getBookId(): ?int
    {
        return Session::has('book_id') ? intval(Session::get('book_id')) : null;
    }

    /**
     * @return Book
     */
    public function getBook(): Book
    {
        return Session::has('book_id') ? Book::find(Session::get('book_id')) : null;
    }

    public function clear(): void
    {
        Session::remove('book_id');
    }
}
