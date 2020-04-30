<?php

namespace App\Services;

use App\Models\Reviews;
use App\Helpers\CollectionHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * Class ReviewManager
 * @package App\Services
 */
class ReviewManager
{
    /**
     * @return LengthAwarePaginator
     * @throws BindingResolutionException
     */
    public function getReviews(): LengthAwarePaginator
    {
        if (Auth::user()->hasAccess('administrator')) {
            return Reviews::paginate();
        }

        $reviews = Reviews::all()->reject(function ($review) {
            return !($review->book->user_id === Auth::user()->id);
        });

        return CollectionHelper::paginate($reviews, $reviews->count(), 14);
    }
}
