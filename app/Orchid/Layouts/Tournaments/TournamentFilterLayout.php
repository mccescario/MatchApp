<?php

namespace App\Orchid\Layouts\Tournaments;

use App\Orchid\Filters\Tournaments\SportFilter;
use Orchid\Filters\Filter;
use Orchid\Screen\Layouts\Selection;

class TournamentFilterLayout extends Selection
{
    /**
     * @return Filter[]
     */
    public function filters(): iterable
    {
        return [
            SportFilter::class,
        ];
    }
}
