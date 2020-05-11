<?php

namespace App\Orchid\Screens;

use App\Topic;
use App\Reviewer;
use App\Models\Book;
use App\Testimonial;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use App\Services\BookLocator;
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
     * @var BookLocator
     */
    public BookLocator $bookLocator;

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

    public function __construct(Request $request = null, BookLocator $bookLocator)
    {
        parent::__construct($request);

        $this->bookLocator = $bookLocator;

        if (isset($_GET['id'])) {
            $bookLocator->init($_GET['id']);
        }
    }

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
            Layout::tabs($this->buildTabbedView()),
        ];
    }

    private function buildTabbedView(): array
    {
        $tabbedView = [];

        $tabbedView['Publication Detail'] = PublicationFormLayout::class;

        if ($this->bookLocator->hasBook()) {
            $tabbedView['Publication Content'] = Layout::columns(
                [
                    TopicFormLayout::class,
                    TopicLayout::class,
                ]
            );

            $tabbedView['Publication Review'] = Layout::columns(
                [
                    PublicationReviewFormLayout::class,
                    PublicationReviewerLayout::class,
                ]
            );


            $tabbedView['Publication Review'] = Layout::columns(
                [
                    PublicationReviewFormLayout::class,
                    PublicationReviewerLayout::class,
                ]
            );

            $tabbedView['Testimonials'] = Layout::columns(
                [
                    TestimonialFormLayout::class,
                    TestimonialLayout::class,
                ]
            );
        }

        return $tabbedView;
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
