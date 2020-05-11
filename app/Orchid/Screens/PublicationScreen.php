<?php

namespace App\Orchid\Screens;

use App\Topic;
use App\Reviewer;
use App\Models\Book;
use App\Testimonial;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use App\Orchid\Layouts\Topic\TopicLayout;
use App\Orchid\Layouts\Topic\TopicFormLayout;
use App\Orchid\Layouts\Testimonials\TestimonialLayout;
use App\Orchid\Layouts\Publishing\PublicationFormLayout;
use App\Orchid\Layouts\Testimonials\TestimonialFormLayout;
use App\Orchid\Layouts\Reviewers\PublicationReviewerLayout;
use App\Orchid\Layouts\Reviewers\PublicationReviewFormLayout;

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
            'topics' => Topic::paginate(),
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
                'Publication Info' => PublicationFormLayout::class,
                'Publication Content' => Layout::columns(
                    [
                        TopicFormLayout::class,
                        TopicLayout::class,
                    ]
                ),
                'Publication Review' => Layout::columns(
                    [
                        PublicationReviewFormLayout::class,
                        PublicationReviewerLayout::class,
                    ],
                ),
                'Testimonials' => Layout::columns(
                    [
                        TestimonialFormLayout::class,
                        TestimonialLayout::class,
                    ]
                )
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
