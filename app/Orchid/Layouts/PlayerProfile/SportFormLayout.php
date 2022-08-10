<?php

namespace App\Orchid\Layouts\PlayerProfile;

use App\Models\Sport;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class SportFormLayout extends Rows
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
            Relation::make('sport_profile.sport_id')
                ->fromModel(Sport::class, 'name')
                ->value($this->query->get('sport_profile.sport_id'))
                ->title('Sport')
        ];
    }
}
