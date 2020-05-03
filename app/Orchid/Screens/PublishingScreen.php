<?php

namespace App\Orchid\Screens;

use App\Models\Book;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Toast;
use App\Services\PublishingManager;
use Orchid\Screen\Actions\ModalToggle;
use App\Orchid\Layouts\Publishing\PublishEditLayout;
use App\Orchid\Layouts\Publishing\PublishListLayout;

/**
 * Class PublishingScreen
 * @package App\Orchid\Screens
 */
class PublishingScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Publishing';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'BookSpot Publishing';

    /**
     * Query data.
     *
     * @param PublishingManager $manager
     * @return array
     */
    public function query(PublishingManager $manager): array
    {
        return [
            'books' => $manager->getList(),
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [
            ModalToggle::make('Upload')
                ->class('btn btn-primary')
                ->icon('icon-cloud-upload')
                ->modal('publishAsyncModal')
                ->method('createPublication')
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            PublishListLayout::class,
            Layout::modal('publishAsyncModal', [
                PublishEditLayout::class
            ])->async('asyncGetBook')
              ->title('Publish A Book')
        ];
    }

    public function asyncGetBook(Book $book)
    {
        return [
            'book' => $book
        ];
    }

    public function createPublication(Request $request, PublishingManager $manager)
    {
        $manager->createPublication($request->input('book'));

        Toast::success('Publication has been created');

        return redirect()->back();
    }
}
