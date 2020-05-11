<?php

namespace App\Repositories;

use App\Models\Book;
use App\Helpers\SlugHelper;
use App\Constants\DashboardView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class PublicationRepository implements Repository
{

    /**
     * @inheritDoc
     */
    public function list(string $needle = null, string $column = 'id', array $options = []): LengthAwarePaginator
    {
        if (Auth::user()->inRole('administrator')) {
            return Book::paginate(DashboardView::PAGINATION_LENGTH);
        }

        return Book::where('user_id', Auth::user()->id)->paginate(DashboardView::PAGINATION_LENGTH);
    }

    /**
     * @inheritDoc
     */
    public function find(string $needle, string $column = 'id', array $options = []): Model
    {
        return Book::findOrFail($needle);
    }

    /**
     * @inheritDoc
     */
    public function persist(array $inputs): Model
    {
        $book = isset($inputs['id']) ? Book::find($inputs['id']) : new Book();
        $book->title = $inputs['title'];
        $book->sub_title = $inputs['sub_title'];
        $book->promotional_title = $inputs['promotional_title'];
        $book->description = $inputs['description'];
        $book->price = $inputs['price'];
        $book->category_id = $inputs['category_id'];
        $book->slug = $book->slug ?? SlugHelper::generate($inputs['title']);
        $book->isbn = $inputs['isbn'];
        $book->cover_image = $inputs['cover_image'];
        $book->user_id = Auth::user()->id;
        $book->save();

        if (!empty($inputs['published_book'])) {
            $book->attachment()->syncWithoutDetaching(
                $inputs['published_book']
            );
        }

        return $book;
    }

    /**
     * @inheritDoc
     */
    public function remove(int $id): void
    {
        $book = Book::findOrFail($id);
        $book->delete();
    }
}
