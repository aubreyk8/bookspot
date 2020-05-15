<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Repositories\SaleRepository;
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
     * @var string[]
     */
    public $permission = [
        'sale-view'
    ];

    /**
     * Query data.
     *
     * @param SaleRepository $saleRepository
     * @return array
     */
    public function query(SaleRepository $saleRepository): array
    {
        return [
            'sales' => $saleRepository->list(),
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
