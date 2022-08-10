<?php

namespace App\Orchid\Screens\Teams;

use App\Models\Team;
use App\Models\TeamMember;
use App\Orchid\Layouts\Teams\TeamMembersLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class TeamViewScreen extends Screen
{
    public $team;
    public $membership;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Team $team): iterable
    {
        return [
            'team' => $team,
            'members' => $team->members,
            'membership' => TeamMember::where('team_id', $team->id)
                ->where('member_id', Auth::user()->id)->first()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return __('Team: ') . $this->team->name;
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Join'))
                ->type(Color::INFO())
                ->icon('user-follow')
                ->canSee((Auth::user()->team() == null && !isset($this->membership)) || ($this->membership->status != TeamMember::APPROVED && $this->membership->status != TeamMember::PENDING && $this->membership->status != TeamMember::OWNER && $this->membership->status != TeamMember::INVITE_PENDING))
                ->method('joinTeam', ['team_id' => $this->team->id, 'membership_id' => $this->membership ? $this->membership->id : null]),
            Button::make(__('Accept Invitation'))
                ->type(Color::SUCCESS())
                ->icon('check')
                ->canSee((Auth::user()->team() == null && ($this->membership ? ($this->membership->status == TeamMember::INVITE_PENDING) : false)))
                ->confirm(__('Are you sure you want to accept invitation?'))
                ->method('acceptInvitation', ['team_id' => $this->team->id, 'membership_id' => $this->membership ? $this->membership->id : null]),
            Button::make(__('Reject Invitation'))
                ->type(Color::DANGER())
                ->icon('ban')
                ->canSee((Auth::user()->team() == null && ($this->membership ? ($this->membership->status == TeamMember::INVITE_PENDING) : false)))
                ->confirm(__('Are you sure you want to reject invitation?'))
                ->method('rejectInvitation', ['team_id' => $this->team->id, 'membership_id' => $this->membership ? $this->membership->id : null]),
            Button::make(__('Cancel Application'))
                ->type(Color::DANGER())
                ->icon('ban')
                ->canSee((Auth::user()->team() == null && ($this->membership ? $this->membership->status == TeamMember::PENDING : false)))
                ->confirm(__('Are you sure you want to cancel invitation?'))
                ->method('cancelApplication', ['team_id' => $this->team->id, 'membership_id' => $this->membership ? $this->membership->id : null]),
            Button::make(__('Leave Team'))
                ->type(Color::DANGER())
                ->icon('ban')
                ->canSee((Auth::user()->team() != null && ($this->membership ? ($this->membership->status == TeamMember::APPROVED) : false)))
                ->confirm(__('Are you sure you want to leave team?'))
                ->method('leaveTeam', ['team_id' => $this->team->id, 'membership_id' => $this->membership ? $this->membership->id : null]),
            Link::make(__('Manage Team'))
                ->type(Color::INFO())
                ->icon('settings')
                ->canSee($this->membership ? $this->membership->status == TeamMember::OWNER : false)
                ->route('teams.teams.manage', ['team' => $this->team->id])
            // ->method('cancelApplication', ['team_id' => $this->team->id, 'membership_id' => $this->membership->id]),
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
            Layout::legend('team', [
                Sight::make('name'),
                Sight::make('sport.name', 'Sport')
                    ->render(function (Team $team) {
                        return $team->sport->name;
                    }),
                Sight::make('members_count', 'Members Count')
                    ->render(function (Team $team) {
                        return $team->members()->count();
                    }),
                Sight::make('owner.name', 'Owner')
                    ->render(function (Team $team) {
                        return $team->owner->name;
                    }),
                Sight::make('Membership')
                    ->render(function () {
                        return __('PENDING APPLICATION');
                    })
                    ->canSee(isset($this->membership) && $this->membership->status == TeamMember::PENDING),
                Sight::make('Membership')
                    ->render(function () {
                        return __('REJECTED APPLICATION');
                    })
                    ->canSee(isset($this->membership) && $this->membership->status == TeamMember::REJECTED),
                Sight::make('Membership')
                    ->render(function () {
                        return __('Member');
                    })
                    ->canSee(isset($this->membership) && $this->membership->status == TeamMember::APPROVED),
            ]),
            TeamMembersLayout::class,
        ];
    }

    public function joinTeam(Request $request)
    {
        if (Auth::user()->team() != null) {
            Toast::error('You already have a team');
            return;
        }

        if ($request->membership_id) {
            $membership = TeamMember::find($request->membership_id);

            $membership->update([
                'status' => TeamMember::PENDING
            ]);

            Toast::success('Team Application Sent');
            return;
        }

        TeamMember::create([
            'team_id' => $request->team_id,
            'member_id' => Auth::user()->id,
            'status' => TeamMember::PENDING,
        ]);

        Toast::success('Team Application Sent');
    }

    public function cancelApplication(Request $request)
    {
        $membership = TeamMember::findOrFail($request->membership_id);

        if ($membership->status != TeamMember::PENDING) {
            Toast::error('Something went wrong');
            return;
        }

        $membership->update([
            'status' => TeamMember::CANCELLED
        ]);

        Toast::success('Team Application Cancelled');
    }

    public function acceptInvitation(Request $request)
    {
        $membership = TeamMember::findOrFail($request->membership_id);

        if ($membership->status != TeamMember::INVITE_PENDING) {
            Toast::error('Something went wrong');
            return;
        }

        $membership->update([
            'status' => TeamMember::APPROVED
        ]);

        Toast::success('Invitation Accepted');
    }

    public function rejectInvitation(Request $request)
    {
        $membership = TeamMember::findOrFail($request->membership_id);

        if ($membership->status != TeamMember::INVITE_PENDING) {
            Toast::error('Something went wrong');
            return;
        }

        $membership->update([
            'status' => TeamMember::INVITE_REJECTED
        ]);

        Toast::success('Invitation Rejected');
    }

    public function leaveTeam(Request $request)
    {
        $membership = TeamMember::findOrFail($request->membership_id);

        if ($membership->status != TeamMember::APPROVED) {
            Toast::error('Something went wrong');
            return;
        }

        $membership->update([
            'status' => TeamMember::LEAVED
        ]);

        Toast::success('Successfully Leaved');
    }
}
