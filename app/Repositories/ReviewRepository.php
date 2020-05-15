<?php

namespace App\Repositories;

use App\Models\Reviews;
use App\Models\Reviewer;
use App\Constants\DashboardView;
use App\Helpers\CollectionHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * Class ReviewRepository
 * @package App\Repositories
 */
class ReviewRepository extends BaseRepository
{
    /**
     * @var string
     */
    protected string $prototype = Reviewer::class;

    /**
     * @param string|null $needle
     * @param string $column
     * @return LengthAwarePaginator
     * @throws BindingResolutionException
     */
    public function list(string $needle = null, string $column = 'id'): LengthAwarePaginator
    {
        if (Auth::user()->inRole('administrator')) {
            return Reviews::paginate(DashboardView::PAGINATION_LENGTH);
        }

        $reviews = Reviews::all()->reject(function ($review) {
            if (empty($review->book)) {
                return true;
            }

            return !($review->book->user_id === Auth::user()->id);
        });

        return CollectionHelper::paginate($reviews, $reviews->count(), DashboardView::PAGINATION_LENGTH);
    }
}
