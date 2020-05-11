<?php

namespace App\Orchid\Layouts\Content;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

/**
 * Class PublicationContentLayout
 * @package App\Orchid\Layouts\Content
 */
class PublicationContentLayout extends Table
{
    public $target = 'topics';

    /**
     * @inheritDoc
     */
    protected function columns(): array
    {
        return [
            TD::set('topic'),
            TD::set('brief_description')
        ];
    }
}
