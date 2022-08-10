<?php

namespace App\Orchid\Screens\Sports;

use App\Models\SportCategory;
use App\Orchid\Layouts\Sports\SportCategoryListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class SportCategoryListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'categories' => SportCategory::all()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Sport Categories';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Register New Category'))
                ->icon('plus')
                ->route('sports.category.create'),
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
            SportCategoryListLayout::class,
        ];
    }

    public function permission(): ?iterable
    {
        return [
            'admin'
        ];
    }
}
