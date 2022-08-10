<?php

namespace App\Orchid\Layouts\Sports;

use App\Models\Sport;
use App\Orchid\Filters\Sports\SportsCategoryFilter;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class SportListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'sports';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name')->sort(),
            TD::make('category.name', 'Category')
                ->render(function (Sport $sport) {
                    return Link::make($sport->category->name)
                        ->route('sports.category.edit', $sport->sport_category_id);
                }),
            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Sport $sport) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            Link::make('Roles')
                                ->route('sports.roles.list', $sport->id)
                                ->icon('equalizer'),
                            Link::make('Edit')
                                ->route('sports.sports.edit', $sport->id)
                                ->icon('pencil')
                        ]);
                }),
        ];
    }
}
