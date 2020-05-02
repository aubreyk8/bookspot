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
    public function getList(): LengthAwarePaginator
    {
        if (Auth::user()->inRole('administrator')) {
            return Book::paginate();
        }

        return Book::where('user_id', Auth::user()->id)->paginate();
    }
}
