<?php

namespace App\Orchid\Layouts\Reviewers;

use Orchid\Screen\TD;
use App\Models\Reviewer;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\Button;
use App\Orchid\Type\IndicatorType;
use Orchid\Screen\Actions\DropDown;

class PublicationReviewerLayout extends Table
{

    /**
     * @var string
     */
    public $target = 'reviewers';

    /**
     * @inheritDoc
     */
    protected function columns(): array
    {
        return [
            TD::set('names', 'Names'),
            TD::set('job_title', 'Job Title'),
            TD::set('facebook', 'Facebook')->render(function (Reviewer $reviewer) {
                return IndicatorType::make(isset($reviewer->facebook), [
                    'Not Linked',
                    'Linked'
                ]);
            })->width(180),
            TD::set('twitter', 'Twitter')->render(function (Reviewer $reviewer) {
                return IndicatorType::make(isset($reviewer->twitter), [
                    'Not Linked',
                    'Linked'
                ]);
            })->width(180),
            TD::set('action', 'Action')->render(function (Reviewer $reviewer) {
                return DropDown::make()->icon('icon-menu')->list([
                    Button::make('Edit')
                        ->icon('icon-pencil')
                        ->method('getReviewer')
                        ->parameters([
                            'review_id' => $reviewer->id,
                        ]),
                    Button::make('Remove')->icon('icon-close')->parameters([
                        'action' => [
                            'id' => $reviewer->id,
                            'book_id' => $reviewer->book_id
                        ]
                    ])->method('removeReview')
                        ->confirm('Are you sure you want to remove Review?'),
                ]);
            })
                ->width(30)
                ->align(TD::ALIGN_CENTER)
        ];
    }
}
