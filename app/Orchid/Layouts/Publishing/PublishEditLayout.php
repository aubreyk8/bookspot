<?php

namespace App\Orchid\Layouts\Publishing;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Cropper;

/**
 * Class PublishEditLayout
 * @package App\Orchid\Layouts\Publishing
 */
class PublishEditLayout extends Rows
{

    /**
     * @inheritDoc
     */
    protected function fields(): array
    {
        return [
            Input::make('book.isbn')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('ISBN'))
                ->placeholder(__('ISBN'))
                ->horizontal(),
            Input::make('book.title')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Title'))
                ->placeholder(__('Title'))
                ->horizontal(),
            Select::make('book.category')
                ->options([
                    'GHOSPEL'  => 'GHOSPEL',
                ])->title('Category')
                ->empty('No select', 0)
                ->horizontal(),
            Cropper::make('book.cover_image')
                ->width(500)
                ->height(300)
                ->accept('image/*'),
            Upload::make('book.published_book')
                ->acceptedFiles('application/pdf')
                ->groups('publications')
                ->maxFiles(1)
        ];
    }
}
