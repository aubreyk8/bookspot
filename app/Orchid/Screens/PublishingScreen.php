<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use Orchid\Screen\Layout;
use Illuminate\Http\Request;
use App\Services\BookLocator;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Button;
use Illuminate\Http\RedirectResponse;
use App\Services\Publishing\PublishingManager;
use App\Orchid\Layouts\Publishing\PublicationLayout;

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
            Button::make('Add Publication')
                ->method('addPublication')
                ->class('btn btn-primary')
                ->icon('icon-plus')
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
            PublicationLayout::class,
        ];
    }

    /**
     * @param BookLocator $bookLocator
     * @return RedirectResponse
     */
    public function addPublication(BookLocator $bookLocator)
    {
        $bookLocator->clear();
        return redirect()->route('platform.publication');
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
    public function updatePublication(Request $request, PublishingManager $manager)
    {
        $manager->updatePublication($request->input('book'));

        Toast::success('Book has been updated');

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
