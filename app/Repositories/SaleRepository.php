<?php

namespace App\Repositories;

use App\Models\Sale;
use App\Constants\DashboardView;
use Illuminate\Support\Facades\Auth;
use Orchid\Attachment\Models\Attachment;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class SaleRepository
 * @package App\Repositories
 */
class SaleRepository extends BaseRepository
{
    /**
     * @var string
     */
    protected string $prototype = Sale::class;

    /**
     * @param string|null $needle
     * @param string $column
     * @return LengthAwarePaginator
     */
    public function list(string $needle = null, string $column = 'id'): LengthAwarePaginator
    {
        if (Auth::user()->inRole('administrator')) {
            return Sale::paginate(DashboardView::PAGINATION_LENGTH);
        }

        return Sale::where('user_id', Auth::user()->id)->paginate(DashboardView::PAGINATION_LENGTH);
    }

    /**
     * @param string $link
     * @return Attachment
     */
    public function getDownload(string $link): Attachment
    {
        $sale = Sale::where('link', $link)->get()->first();
        $sale->downloads = isset($sale->downloads) ? $sale->downloads ++ : 1;
        $sale->save();

        return $sale->book->attachment()->get()->last();
    }
}
