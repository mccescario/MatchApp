<?php

namespace App\Orchid\Screens\Sports;

use App\Models\Sport;
use App\Orchid\Layouts\Sports\SportRoleListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class SportsRoleListScreen extends Screen
{
    public $sport;
    public $roles;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Sport $sport): iterable
    {
        return [
            'sport' => $sport,
            'roles' => $sport->roles,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->sport->name . _(' Roles');
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Add New Role'))
                ->icon('plus')
                ->route(
                    'sports.roles.create',
                    $this->sport->id
                ),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            SportRoleListLayout::class,
        ];
    }

    public function permission(): ?iterable
    {
        return [
            'admin'
        ];
    }
}
