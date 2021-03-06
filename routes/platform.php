<?php

declare(strict_types=1);

use App\Orchid\Screens\SalesScreen;
use Illuminate\Support\Facades\Route;
use App\Orchid\Screens\ReviewsScreen;
use App\Orchid\Screens\DashboardScreen;
use App\Orchid\Screens\PublishingScreen;
use App\Orchid\Screens\PublicationScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/dashboard', DashboardScreen::class)->name('platform.main');
Route::screen('publish', PublishingScreen::class)->name('platform.publishing');
Route::screen('sales', SalesScreen::class)->name('platform.sales');
Route::screen('reviews', ReviewsScreen::class)->name('platform.reviews');
Route::screen('publication', PublicationScreen::class)->name('platform.publication');

// Users...
Route::screen('users/{users}/edit', UserEditScreen::class)->name('platform.systems.users.edit');
Route::screen('users', UserListScreen::class)->name('platform.systems.users');

// Roles...
Route::screen('roles/{roles}/edit', RoleEditScreen::class)->name('platform.systems.roles.edit');
Route::screen('roles/create', RoleEditScreen::class)->name('platform.systems.roles.create');
Route::screen('roles', RoleListScreen::class)->name('platform.systems.roles');
