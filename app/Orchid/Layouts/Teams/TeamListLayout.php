<?php

namespace App\Orchid\Layouts\Teams;

use App\Models\Team;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Color;

class TeamListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'teams';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name')->sort(),
            TD::make('sport.name', 'Sport')
                ->render(function (Team $team) {
                    return $team->sport->name;
                }),
            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Team $team) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            Link::make(__('View'))
                                ->type(Color::DEFAULT())
                                ->icon('eye')
                                ->route('teams.teams.view', $team->id),
                        ]);
                }),
        ];
    }
}
