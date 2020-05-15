<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Repositories\ReviewRepository;
use App\Orchid\Layouts\Reviews\ReviewsListLayout;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * Class ReviewsScreen
 * @package App\Orchid\Screens
 */
class ReviewsScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Reviews';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'BookSpot Reviews';

    /**
     * @var string[]
     */
    public $permission = [
        'review-view'
    ];

    /**
     * Query data.
     *
     * @param ReviewRepository $reviewRepository
     * @return array
     * @throws BindingResolutionException
     */
    public function query(ReviewRepository $reviewRepository): array
    {
        return [
            'reviews' => $reviewRepository->list()
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
            ReviewsListLayout::class,
        ];
    }
}
