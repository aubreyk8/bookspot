<?php

namespace App\Orchid\Layouts\Testimonials;

use App\Services\BookLocator;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\TextArea;

/**
 * Class TestimonialFormLayout
 * @package App\Orchid\Layouts\Testimonials
 */
class TestimonialFormLayout extends Rows
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
            Input::make('testimonial.id')
                ->type('hidden'),
            Input::make('testimonial.names')
                ->title('Names')
                ->placeholder('Names')
                ->horizontal(),
            Input::make('testimonial.job_title')
                ->title('Job Title')
                ->placeholder('Job Title')
                ->horizontal(),
            TextArea::make('testimonial.message')
                ->title('Message')
                ->placeholder('Message')
                ->horizontal()
                ->rows(6),
            Input::make('testimonial.book_id')
                ->type('hidden')
                ->value($this->book_id),
            Button::make('Save')
                ->class('btn btn-primary')
                ->icon('icon-save')
                ->method('saveTestimonial'),
        ];
    }
}
