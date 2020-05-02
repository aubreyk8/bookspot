<?php

namespace App\Services;

use App\Models\Sale;
use App\Models\Visitor;
use Carbon\Carbon;
use App\Models\Reviews;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

/**
 * Class DashboardManager
 * @package App\Services
 */
class DashboardManager
{
    public const THIS_MONTH = 0;
    public const LAST_MONTH = 1;

    /**
     * @var array
     */
    private array $currentMonth = [];

    /**
     * DashboardManager constructor.
     */
    public function __construct()
    {
        $now = Carbon::now();

        $this->currentMonth = [
            [
                'start' => $now->firstOfMonth()->toDateTimeString(),
                'end' => $now->lastOfMonth()->toDateString() . ' 23:59:59'
            ],
            [
                'start' => $now->firstOfMonth()->subMonth(1)->toDateTimeString(),
                'end' => $now->lastOfMonth()->toDateString() . ' 23:59:59'
            ]
        ];
    }

    /**
     * @return array
     */
    public function getMatrix(): array
    {
        return [
            $this->getMonthlySales(),
            $this->getMonthlyVisitors(),
            $this->getMonthlyEarnings(),
            $this->getAverageRating(),
            $this->getTotalReviews(),
        ];
    }

    public function getSixMonthReport(): array
    {
        return [
                    [
                        'name'   => 'Some Data',
                        'values' => [25, 40, 30, 35, 8, 52, 17],
                    ],
                    [
                        'name'   => 'Another Set',
                        'values' => [25, 50, -10, 15, 18, 32, 27],
                    ],
                    [
                        'name'   => 'Yet Another',
                        'values' => [15, 20, -3, -15, 58, 12, -17],
                    ],
                    [
                        'name'   => 'And Last',
                        'values' => [10, 33, -8, -3, 70, 20, -34],
                    ],
        ];
    }

    /**
     * @return array
     */
    public function getMonthlySales(): array
    {
        return $this->buildMatrix(Sale::class, function (Collection $collection) {
            return $collection->count();
        }, 0);
    }

    /**
     * @return array
     */
    public function getMonthlyVisitors(): array
    {
        return $this->buildMatrix(Visitor::class, function (Collection $collection) {
            return $collection->count();
        }, 0);
    }

    /**
     * @return array
     */
    public function getMonthlyEarnings(): array
    {
        return $this->buildMatrix(Sale::class, function (Collection $sale) {
            return $sale->sum('price');
        });
    }

    /**
     * @return array
     */
    public function getAverageRating(): array
    {
        return $this->buildMatrix(Reviews::class, function (Collection $collection) {
            return $collection->average('review') ?? 0;
        });
    }

    /**
     * @return array
     */
    public function getTotalReviews(): array
    {
        return $this->buildMatrix(Reviews::class, function (Collection $collection) {
            return $collection->count();
        }, 0);
    }

    /**
     * @param string $model
     * @param int $month
     * @return mixed
     */
    private function getModelForMonth(string $model, int $month = self::THIS_MONTH)
    {
        $collection = $model::whereBetween('created_at', [
            $this->currentMonth[$month]['start'],
            $this->currentMonth[$month]['end']
        ]);

        if (!Auth::user()->inRole('administrator')) {
        }

        return $collection->get();
    }

    /**
     * @param string $model
     * @param $calcFunction
     * @return array
     */
    private function buildMatrix(string $model, \Closure $calcFunction, $precision = 2): array
    {
        $currentMonth = $calcFunction($this->getModelForMonth($model));
        $lastMonth = $calcFunction($this->getModelForMonth($model, self::LAST_MONTH));

        return  [
            'keyValue' => number_format($currentMonth, $precision),
            'keyDiff' => number_format($this->getDiff($currentMonth, $lastMonth), 2)
        ];
    }

    /**
     * @param float $current
     * @param float $previous
     * @return float
     */
    private function getDiff(float $current, float $previous): float
    {
        return $previous !== 0.0 ? (($current - $previous) / $previous) * 100 : $current;
    }
}
