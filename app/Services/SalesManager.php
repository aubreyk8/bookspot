<?php

namespace App\Services;

use App\Models\Sale;
use App\Constants\DashboardView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class Salesmanager
 * @package App\Services
 */
class SalesManager
{
    public function getSales(): LengthAwarePaginator
    {
        if (Auth::user()->inRole('administrator')) {
            return Sale::paginate(DashboardView::PAGINATION_LENGTH);
        }

        return Sale::where('user_id', Auth::user()->id)->paginate(DashboardView::PAGINATION_LENGTH);
    }
}
