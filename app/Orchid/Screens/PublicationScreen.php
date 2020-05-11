<?php

namespace App\Orchid\Screens;

use App\Reviewer;
use App\Models\Book;
use App\Testimonial;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use App\Orchid\Layouts\Testimonials\TestimonialFormLayout;
use App\Orchid\Layouts\Testimonials\TestimonialListLayout;
use App\Orchid\Layouts\Reviewers\PublicationReviewEditLayout;
use App\Orchid\Layouts\Reviewers\PublicationReviewerListLayout;

/**
 * Class PublicationScreen
 * @package App\Orchid\Screens
 */
class PublicationScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Add New Publication';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'New Book';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'books' => Book::all(),
            'reviewers' => Reviewer::paginate(5),
            'testimonials' => Testimonial::paginate(5),
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::tabs([
                'Publication Info' => PublicationReviewEditLayout::class,
                'Publication Review' => Layout::columns(
                    [
                        PublicationReviewEditLayout::class,
                        PublicationReviewerListLayout::class,
                    ],
                ),
                'Testimonials' => Layout::columns([
                    TestimonialFormLayout::class,
                    TestimonialListLayout::class,
                ])
            ]),
        ];
    }

    public function createOrEditBook(Request $request)
    {
        dd($request->all());
    }

    public function saveReviews(Request $request)
    {
        dd($request->all());
    }
}
