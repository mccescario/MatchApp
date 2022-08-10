<?php

namespace App\Orchid\Layouts\Sports;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class SportsRoleFormLayout extends Rows
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
            Input::make('role.name')
                ->required()
                ->title('Name'),
            Button::make('Save')
                ->class('btn btn-success')
                ->method('createOrUpdateSportRole', [
                    'role_id' => $this->query->has('role') ? $this->query->get('role')->id : null,
                    'sport_id' => $this->query->get('sport')->id,
                ]),
        ];
    }
}
