<?php

namespace App\Orchid\Layouts\Sales;

use App\Models\Sale;
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;

/**
 * Class SalesListLayout
 * @package App\Orchid\Layouts\Sales
 */
class SalesListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'sales';

    /**
     * @inheritDoc
     */
    protected function columns(): array
    {
        return [
            TD::set('id', 'Sale Id')->render(function (Sale $sale) {
                return str_pad($sale->id, '5', '0', STR_PAD_LEFT);
            }),
            TD::set('book_id', 'Book')->render(function (Sale $sale) {
                return isset($sale->book) ? $sale->book->title : '<del>Book Has Been Deleted</del>';
            }),
            TD::set('price', 'Price')->render(function (Sale $sale) {
                return 'R' . $sale->price;
            }),
            TD::set('downloads', 'Downloads'),
            TD::set('expires_on', 'Link Expiry')->render(function (Sale $sale) {
                return $sale->expires_on->diffForHumans();
            }),
            TD::set('created_at', 'Sales Date')->render(function (Sale $sale) {
                return $sale->created_at->toDateString();
            })
        ];
    }
}
