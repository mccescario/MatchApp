<?php

namespace App\Orchid\Layouts\Sports;

use App\Models\SportCategory;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class SportsFormLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [
            Input::make('sport.name')
                ->required()
                ->title('Name'),
            Select::make('sport.sport_category_id')
                ->required()
                ->fromModel(SportCategory::class, 'name'),
            Button::make('Save')
                ->class('btn btn-success')
                ->method('createOrUpdateSport'),
        ];
    }
}
