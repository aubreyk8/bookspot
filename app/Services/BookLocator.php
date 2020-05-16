<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Theme;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

/**
 * Class BookLocator
 * @package App\Services
 */
class BookLocator
{
    /**
     * @var false|string
     */
    private $book_id;

    /**
     * BookLocator constructor.
     */
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

    /**
     * @return int|null
     */
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

    /**
     * @param string $key
     * @return Model|null
     */
    public function getFlashModel(string $key): ?Model
    {
        return Session::pull($key);
    }

    public function clear(): void
    {
        Session::remove('book_id');
    }
}
