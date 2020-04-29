<?php

namespace App\Orchid\Layouts\Sales;

use Orchid\Screen\Layouts\Table;

/**
 * Class SalesListLayout
 * @package App\Orchid\Layouts\Sales
 */
class SalesListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'sales';

    /**
     * @inheritDoc
     */
    protected function columns(): array
    {
        return [

        ];
    }
}
