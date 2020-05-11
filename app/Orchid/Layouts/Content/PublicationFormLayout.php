<?php

namespace App\Orchid\Layouts\Content;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\TextArea;

/**
 * Class PublicationFormLayout
 * @package App\Orchid\Layouts\Content
 */
class PublicationFormLayout extends Rows
{
    /**
     * @inheritDoc
     */
    protected function fields(): array
    {
        return [
            Input::make('topic')
                ->title('Chapter')
                ->placeholder('Chapter')
                ->horizontal(),
            TextArea::make('brief_description')
                ->title('Description')
                ->placeholder('Description')
                ->rows(8)
                ->horizontal()
        ];
    }
}
