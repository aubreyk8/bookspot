<?php

namespace App\Orchid\Layouts\Reviews;

use Orchid\Screen\TD;
use App\Models\Reviews;
use App\Orchid\Type\RatingType;
use Orchid\Screen\Layouts\Table;

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
            TD::set('review', 'Reviews')->render(function (Reviews $reviews) {
                return RatingType::make($reviews->review);
            }),
            TD::set('comment', 'Comment')
        ];
    }
}
