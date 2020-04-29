<?php

namespace App\Orchid\Layouts\Publishing;

use Orchid\Screen\Layouts\Table;

/**
 * Class PublishListLayout
 * @package App\Orchid\Layouts\Publishing
 */
class PublishListLayout extends Table
{
    /**
     * @var string
     */
    protected $target = 'publishing';

    /**
     * @inheritDoc
     */
    protected function columns(): array
    {
        return [

        ];
    }
}
