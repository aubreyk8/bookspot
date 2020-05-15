<?php

namespace App\Providers;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Illuminate\Support\ServiceProvider;

/**
 * Class PermissionServiceProvider
 * @package App\Providers
 */
class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @param Dashboard $dashboard
     * @return void
     */
    public function boot(Dashboard $dashboard)
    {
        $this->addReviewPermission($dashboard);
        $this->addSalePermissions($dashboard);
        $this->addPublicationPermission($dashboard);
        $this->addDashboardPermission($dashboard);
    }

    /**
     * @param Dashboard $dashboard
     */
    private function addReviewPermission(Dashboard $dashboard): void
    {
        $permissions = ItemPermission::group('Review')
            ->addPermission('review-view', 'View Review List')
            ->addPermission('review-edit', 'Edit Review List')
            ->addPermission('review-remove', 'Delete Review');

        $dashboard->registerPermissions($permissions);
    }

    /**
     * @param Dashboard $dashboard
     */
    public function addSalePermissions(Dashboard $dashboard): void
    {
        $permissions = ItemPermission::group('Sale')
            ->addPermission('sale-view', 'View Sale List')
            ->addPermission('sale-edit', 'Edit Sale List')
            ->addPermission('sale-remove', 'Delete Sale');

        $dashboard->registerPermissions($permissions);
    }

    /**
     * @param Dashboard $dashboard
     */
    public function addPublicationPermission(Dashboard $dashboard)
    {
        $permissions = ItemPermission::group('Publication')
            ->addPermission('publication-view', 'View Publication List')
            ->addPermission('publication-edit', 'Edit Publication List')
            ->addPermission('publication-remove', 'Delete Publication');

        $dashboard->registerPermissions($permissions);
    }

    /**
     * @param Dashboard $dashboard
     */
    public function addDashboardPermission(Dashboard $dashboard)
    {
        $permissions = ItemPermission::group('Dashboard')
            ->addPermission('dashboard-view', 'View Dashboard List')
            ->addPermission('dashboard-edit', 'Edit Dashboard List')
            ->addPermission('dashboard-remove', 'Delete Dashboard');

        $dashboard->registerPermissions($permissions);
    }
}
