<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Reviews;
use App\Models\Visitor;
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
     * @var array
     */
    private array $sixMonth = [];

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

        for ($i = 5; $i >= 0; $i --) {
            $this->sixMonth[] = [
                'start' => Carbon::now()->subMonths($i)->firstOfMonth()->toDateTimeString(),
                'end' => Carbon::now()->subMonths($i)->lastOfMonth()->toDateString() . ' 23:59:59'
            ];
        }
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
                        'name'   => 'Sales',
                        'values' => $this->buildSixMonthReport(Sale::class, function (Collection $collection) {
                            return $collection->count();
                        }),
                    ],
                    [
                        'name'   => 'Visitors',
                        'values' => $this->buildSixMonthReport(Visitor::class, function (Collection $collection) {
                            return $collection->count();
                        })
                    ],
                    [
                        'name'   => 'Earnings',
                        'values' => $this->buildSixMonthReport(Sale::class, function (Collection $collection) {
                            return $collection->sum('price');
                        })
                    ],
                    [
                        'name'   => 'Rating',
                        'values' => $this->buildSixMonthReport(Reviews::class, function (Collection $collection) {
                            return number_format($collection->average('review'), 2);
                        })
                    ],
                    [
                        'name'   => 'Reviews',
                        'values' => $this->buildSixMonthReport(Reviews::class, function (Collection $collection) {
                            return $collection->count();
                        })
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
    private function getModelForMonth(string $model, int $month = self::THIS_MONTH): Collection
    {
        return $this->getModelForSpecificMonth($model, $this->currentMonth[$month]);
    }

    /**
     * @param string $model
     * @param array $month
     * @return Collection
     */
    public function getModelForSpecificMonth(string $model, array $month): Collection
    {
        $collection = $model::whereBetween('created_at', [$month['start'], $month['end']]);

        if (!Auth::user()->inRole('administrator')) {
            $collection = $collection->get()->reject(function ($object) {
                if (empty($object->book)) {
                    return true;
                }

                return !($object->book->user_id === Auth::user()->id);
            });
        }

        return $collection instanceof Collection  ? $collection : $collection->get();
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
     * @param string $model
     * @return array
     */
    public function buildSixMonthReport(string $model, \Closure $calcFunction): array
    {
        $data = [];

        foreach ($this->sixMonth as $month) {
            $data[] = $calcFunction($this->getModelForSpecificMonth($model, $month));
        }

        return $data;
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
