<?php

namespace App\Orchid\Layouts\Publishing;

use App\Models\Book;
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use App\Orchid\Type\IndicatorType;

/**
 * Class PublishListLayout
 * @package App\Orchid\Layouts\Publishing
 */
class PublishListLayout extends Table
{
    /**
     * @var string
     */
    protected $target = 'books';

    /**
     * @inheritDoc
     */
    protected function columns(): array
    {
        return [
            TD::set('isbn', 'ISBN'),
            TD::set('title', 'Title'),
            TD::set('status', 'Status')->render(function (Book $book) {
                return IndicatorType::make($book->status, [
                    'Un Published',
                    'Published',
                ]);
            }),
            TD::set('category', 'Category'),
            TD::set('slug', 'Slug'),
            TD::set('user_id', 'Authorize')->render(function (Book $book) {
                return $book->author->first_name . ' ' . $book->author->last_name;
            }),
            TD::set('action')->render(function (Book $book) {
                return DropDown::make()
                    ->icon('icon-menu')
                    ->list([
                        Button::make('Edit')
                            ->icon('icon-pencil'),
                        Button::make('Un Publish')
                            ->icon('icon-ban')
                            ->method('unPublishBook')
                            ->parameters([
                                'id' => $book->id
                            ])->canSee($book->status),
                        Button::make('Publish')
                            ->icon('icon-control-play')
                            ->canSee(!$book->status)
                            ->method('publishBook')
                            ->parameters([
                                'id' => $book->id
                            ]),
                        Button::make('Delete')
                            ->icon('icon-trash')
                            ->method('deletePublication')
                            ->parameters([
                                'id' => $book->id
                            ])
                            ->confirm('Are you sure you want to delete publication?')
                    ]);
            })
        ];
    }
}
