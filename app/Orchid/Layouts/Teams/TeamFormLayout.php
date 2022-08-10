<?php

namespace App\Orchid\Layouts\Teams;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class TeamFormLayout extends Rows
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
            Input::make('team.name')
                ->title('Team Name'),
            Button::make('Save')
                ->class('btn btn-success')
                ->method('createOrUpdateTeam', [
                    'sport_id' => $this->query->get('sport')->id,
                ]),
        ];
    }
}
