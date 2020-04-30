<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;

/**
 * Class SalesScreen
 * @package App\Orchid\Screens
 */
class SalesScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Sales';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'BookSpot Sales';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [];
    }
}
