<?php

namespace App\Orchid\Layouts\Reviewers;

use App\Services\BookLocator;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\TextArea;

/**
 * Class PublicationReviewFormLayout
 * @package App\Orchid\Layouts\Publishing
 */
class PublicationReviewFormLayout extends Rows
{
    /**
     * @var int|null
     */
    public int $book_id;

    /**
     * PublicationReviewFormLayout constructor.
     * @param BookLocator $bookLocator
     * @param array $layouts
     */
    public function __construct(BookLocator $bookLocator, array $layouts = [])
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
            Input::make('reviewer.id')
                ->type('hidden'),
            Input::make('reviewer.names')
                ->type('text')
                ->title('Names')
                ->placeholder('Reviewer\'s Names')
                ->horizontal(),
            Input::make('reviewer.job_title')
                ->type('text')
                ->title("Job Tittle")
                ->placeholder('Reviewer\'s Job title')
                ->horizontal(),
            Input::make('reviewer.facebook')
                ->type('text')
                ->title('Facebook Link')
                ->placeholder('Facebook Link')
                ->horizontal(),
            Input::make('reviewer.twitter')
                ->type('text')
                ->title('Twitter Link')
                ->placeholder('Twitter Link')
                ->horizontal(),
            TextArea::make('reviewer.message')
                ->title('Message')
                ->placeholder('Message')
                ->horizontal()
                ->rows(15)
                ->maxlength(900),
            Cropper::make('reviewer.image')
                ->height(50)
                ->title('Photo')
                ->accept('image/*')
                ->height('CROPPER_IMAGE_WIDTH', 900)
                ->width('CROPPER_IMAGE_HEIGHT', 900)
                ->horizontal(),
            Input::make('reviewer.book_id')
                ->type('hidden')
                ->value($this->book_id),
            Button::make('Save')
                ->class('btn btn-primary pull-center')
                ->icon('icon-save')
                ->method('saveReviews'),
        ];
    }
}
