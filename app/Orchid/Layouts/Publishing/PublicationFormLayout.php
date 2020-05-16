<?php

namespace App\Orchid\Layouts\Publishing;

use App\Models\Category;
use App\Services\BookLocator;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\TextArea;

/**
 * Class PublicationFormLayout
 * @package App\Orchid\Layouts\Publishing
 */
class PublicationFormLayout extends Rows
{
    /**
     * @var int
     */
    private ?int $book_id;

    public function __construct(array $layouts = [], BookLocator $bookLocator)
    {
        parent::__construct($layouts);
        $this->book_id = $bookLocator->getBookId();
    }

    /**
     * @inheritDoc
     */
    protected function fields(): array
    {
        return [
            Input::make('book.id')
                ->type('hidden')
                ->value($this->book_id),
            Input::make('book.isbn')
                ->type('text')
                ->max(255)
                ->horizontal()
                ->title(__('ISBN'))
                ->placeholder(__('ISBN')),
            Input::make('book.title')
                ->type('text')
                ->max(255)
                ->horizontal()
                ->title(__('Title'))
                ->placeholder(__('Title')),
            Input::make('book.sub_title')
                ->type('text')
                ->title('Sub Title')
                ->placeholder('Sub Title')
                ->horizontal(),
            Input::make('book.promotional_title')
                ->type('text')
                ->title('Promotional Title')
                ->placeholder('Promotional Title')
                ->horizontal(),
            Input::make('book.price')
                ->type('number')
                ->title('Price')
                ->placeholder('Price')
                ->horizontal()->step(0.01),
            TextArea::make('book.description')
                ->title('Description')
                ->type('textarea')
                ->max(300)
                ->rows(5)
                ->horizontal()
                ->placeholder('Description'),
            Select::make('book.category_id')
                ->fromModel(Category::class, 'name', 'id')
                ->title('Category')
                ->empty('No select', 0)
                ->horizontal(),
            Cropper::make('book.cover_image')
                ->width(ENV('CROPPER_IMAGE_WIDTH', 900))
                ->height(ENV('CROPPER_IMAGE_HEIGHT', 900))
                ->accept('image/*')
                ->horizontal()
                ->title('Cover photo'),
            Upload::make('book.published_book')
                ->acceptedFiles('application/pdf')
                ->groups('publications')
                ->maxFiles(1)
                ->horizontal()
                ->storage('publication_spaces')
                ->title('eBook (PDF)'),
            Button::make('Save')
                ->class('btn btn-primary')
                ->icon('icon-save')
                ->method('createOrEditBook'),
        ];
    }
}
