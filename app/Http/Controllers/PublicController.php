<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\PublishingManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Exceptions\PublicationNotFoundException;

/**
 * Class PublicController
 * @package App\Http\Controllers
 */
class PublicController extends Controller
{
    /**
     * @var PublishingManager
     */
    private PublishingManager $publicationManager;

    /**
     * PublicController constructor.
     * @param PublishingManager $publicationManager
     */
    public function __construct(PublishingManager $publicationManager)
    {
        $this->publicationManager = $publicationManager;
    }

    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('platform.main');
    }

    /**
     * @param string $slug
     * @return Factory|View
     * @throws PublicationNotFoundException
     */
    public function publication(string $slug): View
    {
        $book = $this->publicationManager->fromSlug($slug);
        return view('theme.fisher.index', compact('book', 'slug'));
    }

    /**
     * @param string $slug
     * @return View
     * @throws PublicationNotFoundException
     */
    public function checkout(string $slug): View
    {
        $book = $this->publicationManager->fromSlug($slug);
        return view('theme.fisher.checkout', compact('book', 'slug'));
    }
}
