<?php

namespace App\Services;

use App\Models\Book;
use App\Helpers\SlugHelper;
use App\Constants\DashboardView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Exceptions\PublicationNotFoundException;

/**
 * Class PublishingManager
 * @package App\Services
 */
class PublishingManager
{
    /**
     * @return LengthAwarePaginator
     */
    public function getList(): LengthAwarePaginator
    {
        if (Auth::user()->inRole('administrator')) {
            return Book::paginate(DashboardView::PAGINATION_LENGTH);
        }

        return Book::where('user_id', Auth::user()->id)->paginate(DashboardView::PAGINATION_LENGTH);
    }

    /**
     * @param array $book
     */
    public function createPublication(array $book): void
    {
        $publication = Book::create([
            'title' => $book['title'],
            'category_id' => $book['category_id'],
            'description' => $book['description'],
            'slug' => SlugHelper::generate($book['title']),
            'isbn' => $book['isbn'],
            'user_id' => Auth::user()->id,
            'cover_image' => $book['cover_image']
        ]);

        if (empty($book['published_book'])) {
            return;
        }

        $publication->attachment()->syncWithoutDetaching(
            $book['published_book']
        );
    }

    /**
     * @param array $bookInputs
     */
    public function updatePublication(array $bookInputs): void
    {
        $book = Book::find($bookInputs['id']);
        $book->fill($bookInputs);
        $book->save();
    }

    /**
     * @param int $id
     */
    public function publish(int $id): void
    {
        $book = Book::findOrFail($id);
        $book->status = true;
        $book->save();
    }

    /**
     * @param int $id
     */
    public function unPublish(int $id): void
    {
        $book = Book::findOrFail($id);
        $book->status = false;
        $book->save();
    }

    /**
     * @param int $id
     */
    public function deletePublication(int $id): void
    {
        $book = Book::findOrFail($id);
        $book->delete();
    }

    /**
     * @param string $slug
     * @return Book
     * @throws PublicationNotFoundException
     */
    public function fromSlug(string $slug): Book
    {
        $book = Book::where('slug', $slug)->get()->first();

        if (!isset($book)) {
            throw new PublicationNotFoundException('Book not found', '404');
        }

        return $book;
    }
}
