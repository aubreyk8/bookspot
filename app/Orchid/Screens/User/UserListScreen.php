<?php

declare(strict_types=1);

namespace App\Orchid\Screens\User;

use Orchid\Screen\Screen;
use Orchid\Screen\Layout;
use Illuminate\Http\Request;
use Orchid\Platform\Models\User;
use Orchid\Support\Facades\Toast;
use Illuminate\Http\RedirectResponse;
use App\Services\Users\UserManagement;
use App\Orchid\Type\EditModalToggleType;
use App\Orchid\Layouts\User\UserEditLayout;
use App\Orchid\Layouts\User\UserListLayout;
use App\Orchid\Layouts\User\UserFiltersLayout;

class UserListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'User';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'All registered users';

    /**
     * @var string
     */
    public $permission = 'platform.systems.users';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'users' => User::with('roles')
                ->filters()
                ->filtersApplySelection(UserFiltersLayout::class)
                ->defaultSort('id', 'desc')
                ->paginate(),
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
            EditModalToggleType::make('Add User')
                ->class('btn btn-primary')
                ->icon('icon-plus')
                ->modal('oneAsyncModal')
                ->modalTitle('Add User')
                ->method('saveUser'),
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
            UserFiltersLayout::class,
            UserListLayout::class,

            Layout::modal('oneAsyncModal', [
                UserEditLayout::class,
            ])->async('asyncGetUser')
                ->applyButton('Save'),
        ];
    }

    /**
     * @param User $user
     *
     * @return array
     */
    public function asyncGetUser(User $user): array
    {
        return [
            'user' => $user,
        ];
    }

    /**
     * @param Request $request
     *
     * @param UserManagement $userManagement
     * @return RedirectResponse
     */
    public function saveUser(Request $request, UserManagement $userManagement)
    {
        $userManagement->createUser($request->get('user'));

        Toast::info(__('User was saved.'));

        return back();
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function remove(Request $request)
    {
        User::findOrFail($request->get('id'))
            ->delete();

        Toast::info(__('User was removed'));

        return back();
    }
}
