<?php

namespace App\Orchid\Screens\Teams;

use App\Models\Team;
use App\Models\TeamMember;
use App\Orchid\Layouts\Teams\TeamMembersManageLayout;
use App\Orchid\Layouts\Teams\TeamNameChangeLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class TeamManageScreen extends Screen
{
    public $team;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Team $team): iterable
    {
        return [
            'team' => $team,
            'members' => $team->members
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return __('Manage Team: ') . $this->team->name;
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Member Applications'))
                ->icon('user-follow')
                ->route('teams.manage.request', [
                    'team' => $this->team->id
                ]),
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
            Layout::block(TeamNameChangeLayout::class)
                ->title(__('Change Team Name'))
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::DEFAULT())
                        ->icon('check')
                        ->method('changeName', [
                            'team_id' => $this->team->id
                        ])
                ),
            Layout::block(TeamMembersManageLayout::class)
                ->title(__('Manage Team Members')),
        ];
    }

    public function changeName(Team $team, Request $request)
    {
        if ($team->owner_id != Auth::user()->id) {
            Toast::error('You do not own the Team');
            return redirect()->route('teams.teams.list');
        }

        $request->validate([
            'team.name' => 'required|max:255'
        ]);

        $team->update($request->get('team'));

        Toast::info(__('Team name updated.'));
    }

    public function removeMember(Team $team, Request $request)
    {
        if ($team->owner_id != Auth::user()->id) {
            Toast::error('You do not own the Team');
            return redirect()->route('teams.teams.list');
        }

        $membership = TeamMember::findOrFail($request->membership_id);

        if ($membership->status !== TeamMember::APPROVED) {
            Toast::error('Error accepting application');
            return;
        }

        $membership->update([
            'status' => TeamMember::REMOVED,
        ]);

        Toast::info(__('Member removed'));
    }
}
