<?php

namespace App\Orchid\Screens;

use App\Models\Book;
use Orchid\Screen\Screen;
use Orchid\Screen\Layout;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Toast;
use App\Services\PublishingManager;
use Illuminate\Http\RedirectResponse;
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

    /**
     * @param Book $book
     * @return array
     */
    public function asyncGetBook(Book $book)
    {
        return [
            'book' => $book
        ];
    }

    /**
     * @param Request $request
     * @param PublishingManager $manager
     * @return RedirectResponse
     */
    public function createPublication(Request $request, PublishingManager $manager)
    {
        $manager->createPublication($request->input('book'));

        Toast::success('Publication has been created');

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param PublishingManager $manager
     * @return RedirectResponse
     */
    public function publishBook(Request $request, PublishingManager $manager)
    {
        $manager->publish($request->input('id'));

        Toast::success('Book has been published');

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param PublishingManager $manager
     * @return RedirectResponse
     */
    public function unPublishBook(Request $request, PublishingManager $manager)
    {
        $manager->unPublish($request->input('id'));

        Toast::success('Book has been un-published');

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param PublishingManager $manager
     * @return RedirectResponse
     */
    public function deletePublication(Request $request, PublishingManager $manager)
    {
        $manager->deletePublication($request->input('id'));

        Toast::success('Book has been deleted');

        return redirect()->back();
    }
}
