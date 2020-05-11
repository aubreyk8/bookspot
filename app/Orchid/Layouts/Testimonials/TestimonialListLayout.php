<?php

namespace App\Orchid\Layouts\Testimonials;

use App\Testimonial;
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;

/**
 * Class TestimonialListLayout
 * @package App\Orchid\Layouts\Testimonials
 */
class TestimonialListLayout extends Table
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
                        Button::make('Edit'),
                        Button::make('Delete'),
                    ]);
            })
        ];
    }
}
