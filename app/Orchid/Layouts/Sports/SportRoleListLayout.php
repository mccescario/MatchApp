<?php

namespace App\Orchid\Layouts\Sports;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class SportRoleListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'roles';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name')->sort(),
            TD::make()
                ->align(TD::ALIGN_RIGHT)
                ->render(function ($role) {
                    return Link::make('Edit')
                        ->route('sports.roles.edit', [
                            'sportRole' => $role->id,
                            'sport' => $this->query->get('sport')->id
                        ])
                        ->icon('pencil');
                })
        ];
    }
}
