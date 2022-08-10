<?php

namespace App\Orchid\Layouts\Teams;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class TeamMembersLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'members';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('member_name', 'Member Name')
                ->render(function ($membership) {
                    return $membership->member->name;
                }),
            TD::make('member_role', 'Role')
                ->render(function ($membership) {
                    return $membership->member->player_profile->sport_role ? $membership->member->player_profile->sport_role->name : __('No Specified Role');
                }),
            TD::make('member_course', 'Course')
                ->render(function ($membership) {
                    return $membership->member->player_profile->course ? $membership->member->player_profile->course->name : __('No Specified Course');
                }),
        ];
    }
}
