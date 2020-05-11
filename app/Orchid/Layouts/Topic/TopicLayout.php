<?php

namespace App\Orchid\Layouts\Topic;

use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;

/**
 * Class PublicationContentLayout
 * @package App\Orchid\Layouts\Content
 */
class TopicLayout extends Table
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
