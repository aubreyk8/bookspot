<?php

namespace App\Services;

use App\Models\Book;
use App\Helpers\SlugHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

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
            return Book::paginate(14);
        }

        return Book::where('user_id', Auth::user()->id)->paginate(14);
    }

    public function createPublication(array $book): void
    {
        $publication = Book::create([
            'title' => $book['title'],
            'category' => $book['category'],
            'slug' => SlugHelper::generate($book['title']),
            'isbn' => $book['isbn'],
            'user_id' => Auth::user()->id,
            'cover_image' => $book['cover_image']
        ]);

        $publication->attachment()->syncWithoutDetaching(
            $book['published_book']
        );
    }
}
