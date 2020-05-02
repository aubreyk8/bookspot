<?php

namespace App\Orchid\Screens;

use App\Orchid\Layouts\Dashboard\DashboardMatrixLayout;
use App\Orchid\Layouts\Examples\ChartBarExample;
use App\Orchid\Layouts\Examples\MetricsExample;
use App\Services\DashboardManager;
use Illuminate\Support\Str;
use Orchid\Screen\Layout;
use Orchid\Screen\Repository;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;

/**
 * Class DashboardScreen
 * @package App\Orchid\Screens
 */
class DashboardScreen extends Screen
{
    /**
     * Fish text for the table.
     */
    public const TEXT_EXAMPLE = 'Lorem ipsum at sed ad fusce faucibus primis, potenti inceptos ad taciti nisi tristique
    urna etiam, primis ut lacus habitasse malesuada ut. Lectus aptent malesuada mattis ut etiam fusce nec sed viverra,
    semper mattis viverra malesuada quam metus vulputate torquent magna, lobortis nec nostra nibh sollicitudin
    erat in luctus.';

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
     * Query data.
     *
     * @return array
     */
    public function query(DashboardManager $manager): array
    {
        return [
            'charts'  => $manager->getSixMonthReport(),
            'table'   => [
                new Repository(
                    ['id' => 100, 'name' => self::TEXT_EXAMPLE, 'price' => 10.24, 'created_at' => '01.01.2020']
                ),
                new Repository(
                    ['id' => 200, 'name' => self::TEXT_EXAMPLE, 'price' => 65.9, 'created_at' => '01.01.2020']
                ),
                new Repository(
                    ['id' => 300, 'name' => self::TEXT_EXAMPLE, 'price' => 754.2, 'created_at' => '01.01.2020']
                ),
                new Repository(
                    ['id' => 400, 'name' => self::TEXT_EXAMPLE, 'price' => 0.1, 'created_at' => '01.01.2020']
                ),
                new Repository(
                    ['id' => 500, 'name' => self::TEXT_EXAMPLE, 'price' => 0.15, 'created_at' => '01.01.2020']
                ),
            ],
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
            ChartBarExample::class,
            Layout::table('table', [
                TD::set('id', 'ID')
                    ->width('150')
                    ->render(function (Repository $model) {
                        // Please use view('path')
                        return "<img src='https://picsum.photos/450/200?random={$model->get('id')}'
                              alt='sample'
                              class='mw-100 d-block img-fluid'>
                            <span class='small text-muted mt-1 mb-0'># {$model->get('id')}</span>";
                    }),

                TD::set('name', 'Name')
                    ->width('450')
                    ->render(function (Repository $model) {
                        return Str::limit($model->get('name'), 200);
                    }),

                TD::set('price', 'Price')
                    ->render(function (Repository $model) {
                        return '$ '.number_format($model->get('price'), 2);
                    }),

                TD::set('created_at', 'Created'),
            ]),
        ];
    }
}
