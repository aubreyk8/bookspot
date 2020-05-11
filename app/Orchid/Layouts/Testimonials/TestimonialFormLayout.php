<?php

namespace App\Orchid\Layouts\Testimonials;

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
     * @inheritDoc
     */
    protected function fields(): array
    {
        return [
            Input::make('names')
                ->title('Names')
                ->placeholder('Names')
                ->horizontal(),
            Input::make('job_title')
                ->title('Job Title')
                ->placeholder('Job Title')
                ->horizontal(),
            TextArea::make('message')
                ->title('Message')
                ->placeholder('Message')
                ->horizontal(),
            Button::make('submit')
                ->class('btn btn-primary')
                ->icon('icon-save'),
        ];
    }
}
