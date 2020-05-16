<?php

namespace App\Orchid\Layouts\Testimonials;

use Orchid\Screen\TD;
use App\Models\Testimonial;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;

/**
 * Class TestimonialListLayout
 * @package App\Orchid\Layouts\Testimonials
 */
class TestimonialLayout extends Table
{

    public $target = 'testimonials';

    /**
     * @inheritDoc
     */
    protected function columns(): array
    {
        return [
            TD::set('names', 'Names'),
            TD::set('job_title', 'Job Title'),
            TD::set('message', 'Message')->render(function (Testimonial $testimonial) {
                return substr($testimonial->message, 0, 70) . '...';
            }),
            TD::set('action', 'Action')->render(function (Testimonial $testimonial) {
                return DropDown::make()
                    ->icon('icon-menu')
                    ->list([
                        Button::make('Delete')
                            ->icon('icon-close')
                            ->method('removeTestimonial')
                            ->parameters([
                                'action' => [
                                    'id' => $testimonial->id,
                                    'book_id' => $testimonial->book_id,
                                ]
                            ]),
                    ]);
            })
        ];
    }
}
