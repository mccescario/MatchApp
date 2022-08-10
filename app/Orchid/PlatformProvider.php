<?php

declare(strict_types=1);

namespace App\Orchid;

use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
            Menu::make(__('Sports'))
                ->icon('social-dribbble')
                ->route('sports.sports.list')
                ->permission('admin')
                ->title(__('Sports')),

            Menu::make(__('Courses'))
                ->icon('building')
                ->route('platform.resource.list', [
                    'resource' => 'course-resources'
                ])
                ->permission('admin'),

            Menu::make(__('Users'))
                ->icon('user')
                ->route('platform.systems.users')
                ->permission('admin')
                ->title(__('Access rights')),

            Menu::make(__('Teams'))
                ->icon('flag')
                ->route('teams.teams.list')
                ->permission('player'),

            Menu::make(__('Team Invitations'))
                ->icon('flag')
                ->route('teams.teams.invitations')
                ->permission('player'),

            Menu::make(__('Tournaments'))
                ->icon('flag')
                ->route('tournaments.tournaments.list')
                ->permission(['player', 'host']),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make('Profile')
                ->route('platform.profile')
                ->icon('user'),
            Menu::make('Player Profile')
                ->route('platform.player-profile')
                ->icon('social-dribbble')
                ->permission('player'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('admin', __('Admin'))
                ->addPermission('host', __('Host'))
                ->addPermission('player', __('Player')),
        ];
    }
}
