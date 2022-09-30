<?php

namespace App\Orchid\Layouts\PlayerProfile;

use App\Models\SportRole;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class SportRoleFormLayout extends Rows
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
            Relation::make('sport_role_profile.sport_role_id')
                ->fromModel(SportRole::class, 'name')
                ->searchColumns('name')
                ->applyScope('sportCheck', $this->query->get('sport_role_profile.sport_id'))
                ->value($this->query->get('sport_role_profile.sport_role_id'))
                ->title('Sport Role')
        ];
    }
}
