<?php

namespace App\Orchid\Layouts\Reviews;

use App\Models\Reviews;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

/**
 * Class ReviewsListLayout
 * @package App\Orchid\Layouts\Reviews
 */
class ReviewsListLayout extends Table
{
    /**
     * @var string
     */
    protected $target = 'reviews';

    /**
     * @inheritDoc
     */
    protected function columns(): array
    {
        return [
            TD::set('isbn', 'ISBN')->render(function (Reviews $reviews) {
                return $reviews->book->isbn;
            }),
            TD::set('book_id', 'Book')->render(function (Reviews $reviews) {
                return $reviews->book->title;
            }),
            TD::set('review', 'Reviews'),
            TD::set('comment', 'Comment')
        ];
    }
}
