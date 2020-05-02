<?php

declare(strict_types=1);

namespace App\Orchid\Composers;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemMenu;
use Orchid\Platform\Menu;

class MainMenuComposer
{
    /**
     * @var Dashboard
     */
    private $dashboard;

    /**
     * MenuComposer constructor.
     *
     * @param Dashboard $dashboard
     */
    public function __construct(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
    }

    /**
     * Registering the main menu items.
     */
    public function compose()
    {
        // Main
        $this->dashboard->menu
            ->add(
                Menu::MAIN,
                ItemMenu::label('Dashboard')
                    ->icon('icon-chart')
                    ->route('platform.main')
                    ->title('Navigation')
            )
            ->add(
                Menu::MAIN,
                ItemMenu::label('Publishing')
                    ->icon('icon-book-open')
                    ->route('platform.publishing')
            )
            ->add(
                Menu::MAIN,
                ItemMenu::label('Sales')
                    ->icon('icon-money')
                    ->route('platform.sales')
            )->add(
                Menu::MAIN,
                ItemMenu::label('Reviews')
                    ->icon('icon-layers')
                    ->route('platform.reviews')
            );
    }
}
