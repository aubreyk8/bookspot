<?php

namespace App\Orchid\Layouts\Reviews;

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

        ];
    }
}
