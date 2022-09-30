<?php

declare(strict_types=1);

use App\Models\Sport;
use App\Models\SportRole;
use App\Models\Team;
use App\Models\Tournament;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Player\PlayerProfileScreen;
use App\Orchid\Screens\Sports\SportCategoryFormScreen;
use App\Orchid\Screens\Sports\SportCategoryListScreen;
use App\Orchid\Screens\Sports\SportFormScreen;
use App\Orchid\Screens\Sports\SportListScreen;
use App\Orchid\Screens\Sports\SportsRoleFormScreen;
use App\Orchid\Screens\Sports\SportsRoleListScreen;
use App\Orchid\Screens\Teams\TeamFormScreen;
use App\Orchid\Screens\Teams\TeamInvitationScreen;
use App\Orchid\Screens\Teams\TeamListScreen;
use App\Orchid\Screens\Teams\TeamManageScreen;
use App\Orchid\Screens\Teams\TeamMemberApplicationsScreen;
use App\Orchid\Screens\Teams\TeamMemberRecruitmentScreen;
use App\Orchid\Screens\Teams\TeamViewScreen;
use App\Orchid\Screens\Teams\TeamProfileScreen;
use App\Orchid\Screens\Tournaments\MatchViewScreen;
use App\Orchid\Screens\Tournaments\TournamentBracketScreen;
use App\Orchid\Screens\Tournaments\TournamentFormScreen;
use App\Orchid\Screens\Tournaments\TournamentListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

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
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Profile'), route('platform.profile'));
    });

// Platform > Player Profile
Route::screen('player-profile', PlayerProfileScreen::class)
    ->name('platform.player-profile')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Player Profile'), route('platform.player-profile'));
    });

// Platform > System > Users
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(function (Trail $trail, $user) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('User'), route('platform.systems.users.edit', $user));
    });

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('Create'), route('platform.systems.users.create'));
    });

// Platform > System > Users > User
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Users'), route('platform.systems.users'));
    });

// Sports > Sports > List
Route::screen('sports', SportListScreen::class)
    ->name('sports.sports.list')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            // ->parent('platform.index')
            ->push(__('Sports'), route('sports.sports.list'));
    });

// Sports > Sports > Create
Route::screen('sports/create', SportFormScreen::class)
    ->name('sports.sports.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('sports.sports.list')
            ->push(__('Create'), route('sports.sports.create'));
    });

// Sports > Sports > Edit
Route::screen('sports/{sport}/edit', SportFormScreen::class)
    ->name('sports.sports.edit')
    ->breadcrumbs(function (Trail $trail, $sport) {
        return $trail
            ->parent('sports.sports.list')
            ->push(__('Edit'), route('sports.sports.edit', $sport));
    });

// Sports > Roles > List
Route::screen('sports/{sport}/roles', SportsRoleListScreen::class)
    ->name('sports.roles.list')
    ->breadcrumbs(function (Trail $trail, $sport) {
        return $trail
            ->parent('sports.sports.list')
            ->push($sport->name . __(' Roles'), route('sports.roles.list', $sport));
    });

// Sports > Roles > Create
Route::screen('sports/{sport}/roles/create', SportsRoleFormScreen::class)
    ->name('sports.roles.create')
    ->breadcrumbs(function (Trail $trail, $sport) {
        return $trail
            ->parent('sports.sports.list')
            ->push($sport->name . __(' Roles'), route('sports.roles.list', $sport->id))
            ->push(__('Create Role'), route('sports.roles.create', $sport->id));
    });

// Sports > Roles > Edit
Route::screen('sports/{sport}/roles/{sportRole}/edit', SportsRoleFormScreen::class)
    ->name('sports.roles.edit')
    ->breadcrumbs(function (Trail $trail, Sport $sport, SportRole $sportRole) {
        return $trail
            ->parent('sports.sports.list')
            ->push($sport->name . __(' Roles'), route('sports.roles.list', $sport->id))
            ->push($sport->name . __(': ') . __(' Role') . $sportRole->name, route('sports.roles.edit', [
                'sportRole' => $sportRole->id,
                'sport' => $sport,
            ]));
    });

// Sports > Categories > List
Route::screen('sports/categories', SportCategoryListScreen::class)
    ->name('sports.category.list')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('sports.sports.list')
            ->push(__('Sport Categories'), route('sports.category.list'));
    });

// Sports > Categories > Create
Route::screen('sports/categories/create', SportCategoryFormScreen::class)
    ->name('sports.category.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('sports.sports.list')
            ->push(__('Sports Categories'), route('sports.category.list'))
            ->push(__('Create'), route('sports.category.create'));
    });

// Sports > Categories > Update
Route::screen('sports/categories/{category}/edit', SportCategoryFormScreen::class)
    ->name('sports.category.edit')
    ->breadcrumbs(function (Trail $trail, $category) {
        return $trail
            ->parent('sports.sports.list')
            ->push(__('Sports Categories'), route('sports.category.list'))
            ->push(__('Edit'), route('sports.category.edit', $category));
    });

// Sports > Sports > List
Route::screen('teams', TeamListScreen::class)
    ->name('teams.teams.list')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            // ->parent('platform.index')
            ->push(__('Teams'), route('teams.teams.list'));
    });

// Sports > Sports > Create
Route::screen('teams/invitations', TeamInvitationScreen::class)
    ->name('teams.teams.invitations')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            // ->parent('teams.teams.list')
            ->push(__('Invitations'), route('teams.teams.invitations'));
    });

// Sports > Sports > Create
Route::screen('teams/create', TeamFormScreen::class)
    ->name('teams.teams.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('teams.teams.list')
            ->push(__('Create'), route('teams.teams.create'));
    });

// Sports > Sports > View
Route::screen('teams/{team}/view', TeamViewScreen::class)
    ->name('teams.teams.view')
    ->breadcrumbs(function (Trail $trail, Team $team) {
        return $trail
            ->parent('teams.teams.list')
            ->push(__('View'), route('teams.teams.view', $team));
    });
    
// Sports > Teams > Profile
Route::screen('teams/{team}/profile', TeamProfileScreen::class)
    ->name('teams.teams.profile')
    ->breadcrumbs(function (Trail $trail, Team $team) {
        return $trail
            ->parent('teams.teams.list')
            ->push(__('Profile'), route('teams.teams.profile', $team));
});

// Sports > Sports > Manage
Route::screen('teams/{team}/manage', TeamManageScreen::class)
    ->name('teams.teams.manage')
    ->breadcrumbs(function (Trail $trail, Team $team) {
        return $trail
            ->parent('teams.teams.list')
            ->push(__('View'), route('teams.teams.view', $team))
            ->push(__('Manage'), route('teams.teams.manage', $team));
    });

// Sports > Manage > Sports
Route::screen('teams/{team}/manage/requests', TeamMemberApplicationsScreen::class)
    ->name('teams.manage.request')
    ->breadcrumbs(function (Trail $trail, Team $team) {
        return $trail
            ->parent('teams.teams.list')
            ->push(__('View'), route('teams.teams.view', $team))
            ->push(__('Manage'), route('teams.teams.manage', $team))
            ->push(__('Member Applications'), route('teams.manage.request', $team));
    });

Route::screen('teams/{team}/manage/recruit', TeamMemberRecruitmentScreen::class)
    ->name('teams.manage.recruit')
    ->breadcrumbs(function (Trail $trail, Team $team) {
        return $trail
            ->parent('teams.teams.list')
            ->push(__('View'), route('teams.teams.view', $team))
            ->push(__('Manage'), route('teams.teams.manage', $team))
            ->push(__('Member Recruitment'), route('teams.manage.recruit', $team));
    });

// Tournaments > Tournaments > List
Route::screen('tournaments', TournamentListScreen::class)
    ->name('tournaments.tournaments.list')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            // ->parent('sports.sports.list')
            ->push(__('Tournament List'), route('tournaments.tournaments.list'));
    });

// Tournaments > Tournaments > Create
Route::screen('tournaments/create', TournamentFormScreen::class)
    ->name('tournaments.tournaments.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('tournaments.tournaments.list')
            ->push(__('Create'), route('tournaments.tournaments.create'));
    });

// Tournaments > Tournaments > Edit
Route::screen('tournaments/{tournament}/edit', TournamentFormScreen::class)
    ->name('tournaments.tournaments.edit')
    ->breadcrumbs(function (Trail $trail, $tournament) {
        return $trail
            ->parent('tournaments.tournaments.list')
            ->push(__('Edit'), route('tournaments.tournaments.edit', ['tournament' => $tournament]));
    });

// Tournaments > Tournaments > Bracket
Route::screen('tournaments/{tournament}/bracket', TournamentBracketScreen::class)
    ->name('tournaments.tournaments.bracket')
    ->breadcrumbs(function (Trail $trail, $tournament) {
        return $trail
            ->parent('tournaments.tournaments.list')
            ->push(__('Bracket'), route('tournaments.tournaments.bracket', ['tournament' => $tournament]));
    });

// Tournaments > Tournaments > View
Route::screen('tournaments/{tournament}/view', MatchViewScreen::class)
    ->name('tournaments.tournaments.view')
    ->breadcrumbs(function (Trail $trail, $tournament) {
        return $trail
            ->parent('tournaments.tournaments.list')
            ->push(__('View'), route('tournaments.tournaments.view', ['tournament' => $tournament]));
    });

// Route::screen('example-fields', ExampleFieldsScreen::class)->name('platform.example.fields');
// Route::screen('example-layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
// Route::screen('example-charts', ExampleChartsScreen::class)->name('platform.example.charts');
// Route::screen('example-editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
// Route::screen('example-cards', ExampleCardsScreen::class)->name('platform.example.cards');
// Route::screen('example-advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');

//Route::screen('idea', Idea::class, 'platform.screens.idea');
