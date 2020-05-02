<?php

namespace App\Orchid\Layouts\Dashboard;

use Carbon\Carbon;
use Orchid\Screen\Layouts\Chart;

/**
 * Class SixMonthReportLayout
 * @package App\Orchid\Layouts\Dashboard
 */
class SixMonthReportLayout extends Chart
{
    /**
     * @var string
     */
    protected $title = 'Six Month Report';

    /**
     * @var int
     */
    protected $height = 550;

    /**
     * Available options:
     * 'bar', 'line',
     * 'pie', 'percentage'.
     *
     * @var string
     */
    protected $type = 'line';

    /**
     * @var array
     */
    protected $labels = [];

    /**
     * @var string
     */
    protected $target = 'charts';

    public function __construct()
    {
        for ($i = 5; $i >= 0; $i --) {
            $this->labels[] = Carbon::now()->subMonths($i)->getTranslatedMonthName();
        }
    }
}
