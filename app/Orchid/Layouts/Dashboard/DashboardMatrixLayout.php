<?php

namespace App\Orchid\Layouts\Dashboard;

use Carbon\Carbon;
use Orchid\Screen\Layouts\Metric;

/**
 * Class DashboardMatrixLayout
 * @package App\Orchid\Layouts\Dashboard
 */
class DashboardMatrixLayout extends Metric
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $target = 'metrics';

    /**
     * @var array
     */
    protected $labels = [
        'Sales This Month',
        'Visitors This Month',
        'Total Earnings',
        'Average Rating',
        'Total Reviews',
    ];

    public function __construct()
    {
        $this->title = Carbon::now()->getTranslatedMonthName() . ' Matrix';
    }
}
