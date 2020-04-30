<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Services\ReviewManager;
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
     * Query data.
     *
     * @param ReviewManager $manager
     * @return array
     * @throws BindingResolutionException
     */
    public function query(ReviewManager $manager): array
    {
        return [
            'reviews' => $manager->getReviews()
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
