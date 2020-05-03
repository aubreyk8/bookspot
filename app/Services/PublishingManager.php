<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class PublishingManager
 * @package App\Services
 */
class PublishingManager
{
    /**
     * @return LengthAwarePaginator
     */
    public function getList(): LengthAwarePaginator
    {
        if (Auth::user()->inRole('administrator')) {
            return Book::paginate(14);
        }

        return Book::where('user_id', Auth::user()->id)->paginate(14);
    }
}
