<?php

namespace App\Orchid\Layouts\Teams;

use App\Models\TeamMember;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Color;

class TeamMembersManageLayout extends Table
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
            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (TeamMember $membership) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list($membership->status !== TeamMember::OWNER ? [
                            Button::make(__('Remove Member'))
                                ->type(Color::DANGER())
                                ->icon('ban')
                                ->confirm(__('Are you sure you want to remove member?'))
                                ->method('removeMember', [
                                    'membership_id' => $membership->id
                                ])
                        ] : []);
                }),
        ];
    }
}
