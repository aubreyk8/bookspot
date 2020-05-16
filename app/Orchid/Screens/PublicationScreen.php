<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use App\Services\BookLocator;
use Orchid\Support\Facades\Alert;
use App\Http\Requests\ThemeRequest;
use App\Repositories\TopicRepository;
use App\Repositories\ThemeRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Repositories\ReviewerRepository;
use App\Http\Requests\PublicationRequest;
use App\Orchid\Layouts\Topic\TopicLayout;
use App\Repositories\PublicationRepository;
use App\Repositories\TestimonialRepository;
use App\Orchid\Layouts\Topic\TopicFormLayout;
use App\Orchid\Layouts\Theme\ThemeFormLayout;
use App\Http\Requests\PublicationReviewRequest;
use App\Http\Requests\PublicationTopicsRequest;
use App\Http\Requests\PublicationTestimonialRequest;
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
    }

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'book' => $this->bookLocator->getBook(),
            'topics' => $this->bookLocator->getBookTopics(),
            'topic' => $this->bookLocator->getFlashModel('flash_topic'),
            'reviewers' => $this->bookLocator->getBookReviewers(),
            'reviewer' => $this->bookLocator->getFlashModel('flash_reviewer'),
            'testimonials' => $this->bookLocator->getBookTestimonials(),
            'testimonial' => $this->bookLocator->getFlashModel('flash_testimonial'),
            'theme' => $this->bookLocator->getBookTheme(),
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

    /**
     * @return array
     */
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

            $tabbedView['Theme Settings'] = ThemeFormLayout::class;
        }

        return $tabbedView;
    }

    /**
     * @param PublicationRequest $request
     * @param PublicationRepository $publicationRepository
     * @return RedirectResponse
     */
    public function createOrEditBook(
        PublicationRequest $request,
        PublicationRepository $publicationRepository
    ): RedirectResponse {
       $book = $publicationRepository->persist($request->toArray()['book']);

       Alert::success('Publication has been saved');

        return redirect()->route('platform.publication', ['sequence_no' => base64_encode($book->id)]);
    }

    /**
     * @param PublicationTopicsRequest $request
     * @param TopicRepository $repository
     * @return RedirectResponse
     */
    public function saveBookTopics(
        PublicationTopicsRequest $request,
        TopicRepository $repository
    ): RedirectResponse {
        $inputs = $request->toArray()['topic'];

        $repository->persist($inputs);

        Alert::success('Chapter has been saved');

        return redirect()->route('platform.publication', ['sequence_no' => base64_encode($inputs['book_id'])]);
    }

    /**
     * @param Request $request
     * @param TopicRepository $topicRepository
     * @return RedirectResponse
     */
    public function getTopic(Request $request, TopicRepository $topicRepository): RedirectResponse
    {
        $topic = $topicRepository->find($request->input('topic_id'));

        Session::put('flash_topic', $topic);

        return redirect()->route('platform.publication', ['sequence_no' => base64_encode($topic->book_id)]);
    }

    /**
     * @param Request $request
     * @param TopicRepository $repository
     * @return RedirectResponse
     */
    public function removeTopic(Request $request, TopicRepository $repository): RedirectResponse
    {
        $inputs = $request->input('action');

        $repository->remove($inputs['id']);

        Alert::warning('Chapter has been removed');

        return redirect()->route('platform.publication', ['sequence_no' => base64_encode($inputs['book_id'])]);
    }

    /**
     * @param PublicationReviewRequest $request
     * @param ReviewerRepository $repository
     * @return RedirectResponse
     */
    public function saveReviews(PublicationReviewRequest $request, ReviewerRepository $repository): RedirectResponse
    {
        $inputs = $request->input('reviewer');

        $repository->persist($inputs);

        Alert::success('Reviewer has been saved');

        return redirect()->route('platform.publication', ['sequence_no' => base64_encode($inputs['book_id'])]);
    }

    /**
     * @param Request $request
     * @param ReviewerRepository $reviewerRepository
     * @return RedirectResponse
     */
    public function getReviewer(Request $request, ReviewerRepository $reviewerRepository): RedirectResponse
    {
        $review = $reviewerRepository->find($request->input('review_id'));

        Session::put('flash_reviewer', $review);

        return redirect()->route('platform.publication', ['sequence_no' => base64_encode($review->book_id)]);
    }

    /**
     * @param Request $request
     * @param ReviewerRepository $repository
     * @return RedirectResponse
     */
    public function removeReview(Request $request, ReviewerRepository $repository): RedirectResponse
    {
        $inputs = $request->input('action');

        $repository->remove($inputs['id']);

        Alert::warning('Review has been deleted');

        return redirect()->route('platform.publication', ['sequence_no' => base64_encode($inputs['book_id'])]);
    }

    /**
     * @param PublicationTestimonialRequest $request
     * @param TestimonialRepository $repository
     * @return RedirectResponse
     */
    public function saveTestimonial(
        PublicationTestimonialRequest $request,
        TestimonialRepository $repository
    ): RedirectResponse {
        $inputs = $request->toArray()['testimonial'];

        $repository->persist($inputs);

        Alert::success('Testimonial has been added');

        return redirect()->route('platform.publication', ['sequence_no' => base64_encode($inputs['book_id'])]);
    }

    /**
     * @param Request $request
     * @param TestimonialRepository $testimonialRepository
     * @return RedirectResponse
     */
    public function getTestimonial(Request $request, TestimonialRepository $testimonialRepository): RedirectResponse
    {
        $testimonial = $testimonialRepository->find($request->input('testimonial_id'));

        Session::put('flash_testimonial', $testimonial);

        return redirect()->route('platform.publication', ['sequence_no' => base64_encode($testimonial->book_id)]);
    }

    /**
     * @param Request $request
     * @param TestimonialRepository $repository
     * @return RedirectResponse
     */
    public function removeTestimonial(Request $request, TestimonialRepository $repository): RedirectResponse
    {
        $inputs = $request->input('action');

        $repository->remove($inputs['id']);

        Alert::warning('Testimonial has been removed');

        return redirect()->route('platform.publication', ['sequence_no' => base64_encode($inputs['book_id'])]);
    }

    /**
     * @param ThemeRequest $request
     * @param ThemeRepository $themeRepository
     * @return RedirectResponse
     */
    public function saveThemeSettings(ThemeRequest $request, ThemeRepository $themeRepository): RedirectResponse
    {
        $inputs = $request->toArray()['theme'];

        $themeRepository->persist($inputs);

        Alert::success('Theme has been updated');

        return redirect()->route('platform.publication', ['sequence_no' => base64_encode($inputs['book_id'])]);
    }
}
