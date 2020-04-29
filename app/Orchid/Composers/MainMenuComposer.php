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
        // Profile
        $this->dashboard->menu
            ->add(
                Menu::PROFILE,
                ItemMenu::label('Action')
                    ->icon('icon-compass')
                    ->badge(function () {
                        return 6;
                    })
            )
            ->add(
                Menu::PROFILE,
                ItemMenu::label('Another action')
                    ->icon('icon-heart')
            );

        // Main
        $this->dashboard->menu
            ->add(
                Menu::MAIN,
                ItemMenu::label('Dashboard')
                    ->icon('icon-monitor')
                    ->route('platform.dashboard')
                    ->title('Navigation')
            )
            ->add(
                Menu::MAIN,
                ItemMenu::label('Publishing')
                    ->icon('icon-list')
                    ->route('platform.publishing')
            )
            ->add(
                Menu::MAIN,
                ItemMenu::label('Sales')
                    ->icon('icon-layers')
                    ->route('platform.sales')
            )->add(
                Menu::MAIN,
                ItemMenu::label('Reviews')
                    ->icon('icon-layers')
                    ->route('platform.reviews')
            );
    }
}
