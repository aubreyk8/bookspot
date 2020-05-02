<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Services\SalesManager;
use App\Orchid\Layouts\Sales\SalesListLayout;

/**
 * Class SalesScreen
 * @package App\Orchid\Screens
 */
class SalesScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Sales';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'BookSpot Sales';

    /**
     * Query data.
     *
     * @param SalesManager $manager
     * @return array
     */
    public function query(SalesManager $manager): array
    {
        return [
            'sales' => $manager->getSales(),
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
            SalesListLayout::class,
        ];
    }
}
