<?php

namespace App\Orchid\Layouts\Sports;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class SportCategoryListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'categories';

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
                ->render(function ($category) {
                    return Link::make('Edit')
                        ->route('sports.category.edit', $category)
                        ->icon('pencil');
                })
        ];
    }
}
