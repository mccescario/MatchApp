<?php

namespace App\Orchid\Screens\Sports;

use App\Models\Sport;
use App\Orchid\Filters\Sports\SportsCategoryFilter;
use App\Orchid\Layouts\Sports\SportListLayout;
use App\Orchid\Layouts\Sports\SportsFilterLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class SportListScreen extends Screen
{
    public $sports;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'sports' => Sport::filtersApply([SportsCategoryFilter::class])->paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Sports';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Sport Categories'))
                ->icon('modules')
                ->route('sports.category.list'),
            Link::make(__('Register Sport'))
                ->icon('plus')
                ->route('sports.sports.create'),
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
            SportsFilterLayout::class,
            SportListLayout::class,
        ];
    }

    public function permission(): ?iterable
    {
        return [
            'admin'
        ];
    }
}
