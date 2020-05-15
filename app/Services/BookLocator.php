<?php

namespace App\Services;

use App\Theme;
use App\Models\Book;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

/**
 * Class BookLocator
 * @package App\Services
 */
class BookLocator
{
    private $book_id;

    public function __construct()
    {
        if (isset($_GET['sequence_no'])) {
            $this->book_id = base64_decode($_GET['sequence_no']);
        }
    }

    /**
     * @return bool
     */
    public function hasBook(): bool
    {
        return isset($this->book_id);
    }

    public function getBookId(): ?int
    {
        return $this->book_id;
    }

    /**
     * @return Book
     */
    public function getBook(): ?Book
    {
        return $this->hasBook() ? Book::find($this->getBookId()) : null;
    }

    /**
     * @return Collection
     */
    public function getBookTopics(): Collection
    {
        return $this->hasBook() ? $this->getBook()->topics : new Collection();
    }

    /**
     * @return Collection
     */
    public function getBookReviewers(): Collection
    {
        return $this->hasBook() ? $this->getBook()->reviewer : new Collection();
    }

    /**
     * @return Collection
     */
    public function getBookTestimonials(): Collection
    {
        return  $this->hasBook() ? $this->getBook()->testimonials : new Collection();
    }

    /**
     * @return Theme|null
     */
    public function getBookTheme(): ?Theme
    {
        return $this->hasBook() ? $this->getBook()->theme : null;
    }

    public function clear(): void
    {
        Session::remove('book_id');
    }
}
