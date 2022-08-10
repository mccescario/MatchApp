<?php

namespace App\Orchid\Layouts\Sports;

use App\Orchid\Filters\Sports\SportsCategoryFilter;
use Orchid\Filters\Filter;
use Orchid\Screen\Layouts\Selection;

class SportsFilterLayout extends Selection
{
    /**
     * @return Filter[]
     */
    public function filters(): iterable
    {
        return [
            SportsCategoryFilter::class,
        ];
    }
}
