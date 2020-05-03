<?php

namespace App\Orchid\Layouts\Publishing;

use App\Models\Category;
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
            Input::make('book.id')
                ->type('hidden'),
            Input::make('book.isbn')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('ISBN'))
                ->placeholder(__('ISBN'))
                ->horizontal()
                ->required(),
            Input::make('book.title')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Title'))
                ->placeholder(__('Title'))
                ->horizontal()
                ->required(),
            Select::make('book.category_id')
                ->fromModel(Category::class, 'name', 'id')
                ->title('Category')
                ->empty('No select', 0)
                ->horizontal()
                ->required(),
            Cropper::make('book.cover_image')
                ->width(ENV('CROPPER_IMAGE_WIDTH', 500))
                ->height(ENV('CROPPER_IMAGE_HEIGHT', 300))
                ->accept('image/*')
                ->required(),
            Upload::make('book.published_book')
                ->acceptedFiles('application/pdf')
                ->groups('publications')
                ->maxFiles(1)
        ];
    }
}
