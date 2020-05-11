<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use Orchid\Screen\Layout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Toast;
use App\Services\PublishingManager;
use Illuminate\Http\RedirectResponse;
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
            Link::make('Add Publication')
                ->icon('icon-plus')
                ->class('btn btn-primary')
                ->route('platform.publication')
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
