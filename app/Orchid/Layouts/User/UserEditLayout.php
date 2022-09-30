<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class UserEditLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('user.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Name'))
                ->placeholder(__('Name'))
                ->canSee($this->query->get('profile') == null),
            Input::make('profile.first_name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('First Name'))
                ->canSee($this->query->get('profile') != null),
            Input::make('profile.last_name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Last Name'))
                ->canSee($this->query->get('profile') != null),
            Input::make('user.email')
                ->type('email')
                ->required()
                ->title(__('Email'))
                ->placeholder(__('Email')),
        ];
    }
}
