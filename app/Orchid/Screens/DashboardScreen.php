<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use App\Services\DashboardManager;
use App\Orchid\Layouts\Dashboard\SixMonthReportLayout;
use App\Orchid\Layouts\Dashboard\DashboardMatrixLayout;

/**
 * Class DashboardScreen
 * @package App\Orchid\Screens
 */
class DashboardScreen extends Screen
{

    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Dashboard';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'BookSpot Dashboard';

    /**
     * @var array
     */
    public $permission = [
        'dashboard-view'
    ];

    /**
     * Query data.
     *
     * @param DashboardManager $manager
     * @return array
     */
    public function query(DashboardManager $manager): array
    {
        return [
            'charts'  => $manager->getSixMonthReport(),
            'metrics' => $manager->getMatrix(),
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
            DashboardMatrixLayout::class,
            SixMonthReportLayout::class,
        ];
    }
}
