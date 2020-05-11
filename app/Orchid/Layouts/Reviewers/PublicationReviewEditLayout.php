<?php

namespace App\Orchid\Layouts\Reviewers;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\TextArea;

/**
 * Class PublicationReviewEditLayout
 * @package App\Orchid\Layouts\Publishing
 */
class PublicationReviewEditLayout extends Rows
{

    /**
     * @inheritDoc
     */
    protected function fields(): array
    {
        return [
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
                ->rows(8)
                ->maxlength(255),
            Cropper::make('image')->height(50),
            Button::make('submit')
                ->class('btn btn-primary pull-center')
                ->icon('icon-save')
                ->method('saveReviews'),
        ];
    }
}
