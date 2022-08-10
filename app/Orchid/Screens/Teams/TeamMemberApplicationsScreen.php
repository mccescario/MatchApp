<?php

namespace App\Orchid\Screens\Teams;

use App\Models\Team;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class TeamMemberApplicationsScreen extends Screen
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
            'requests' => $team->requests,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return __('Member Applications: ') . $this->team->name;
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Invite Players'))
                ->icon('user-follow')
                ->type(Color::INFO())
                ->route('teams.manage.recruit', [
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
            Layout::table('requests', [
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
                                Button::make(__('Approve Member'))
                                    ->type(Color::SUCCESS())
                                    ->icon('check')
                                    ->confirm(__('Are you sure you want to approve member?'))
                                    ->method('approveMember', [
                                        'membership_id' => $membership->id
                                    ]),
                                Button::make(__('Reject Member'))
                                    ->type(Color::DANGER())
                                    ->icon('ban')
                                    ->confirm(__('Are you sure you want to reject member?'))
                                    ->method('rejectMember', [
                                        'membership_id' => $membership->id
                                    ]),
                            ] : []);
                    }),
            ]),
            // Layout::modal('invitationModal', [
            //     Layout::rows([
            //         Select::make('invite.user_id')
            //             ->required()
            //             ->fromQuery(User::has('player_profile')
            //                 ->whereRelation('player_profile', 'sport_id', $this->team->sport_id)
            //                 ->whereDoesntHave('memberships', function (Builder $query) {
            //                     return $query->whereIn('status', [TeamMember::APPROVED, TeamMember::OWNER]);
            //                 }), 'name')
            //     ])
            // ])
            //     ->title('Invite Player')
            //     ->applyButton('Send Invitation')
        ];
    }

    public function approveMember(Team $team, Request $request)
    {
        if ($team->owner_id != Auth::user()->id) {
            Toast::error('You do not own the Team');
            return redirect()->route('teams.teams.list');
        }

        $membership = TeamMember::findOrFail($request->membership_id);

        if ($membership->status !== TeamMember::PENDING) {
            Toast::error('Error accepting application');
            return;
        }

        $membership->update([
            'status' => TeamMember::APPROVED,
        ]);

        TeamMember::where('status', TeamMember::PENDING)
            ->update(['status' => TeamMember::CANCELLED]);

        Toast::info(__('Member approved'));
    }

    public function rejectMember(Team $team, Request $request)
    {
        if ($team->owner_id != Auth::user()->id) {
            Toast::error('You do not own the Team');
            return redirect()->route('teams.teams.list');
        }

        $membership = TeamMember::findOrFail($request->membership_id);

        if ($membership->status !== TeamMember::PENDING) {
            Toast::error('Error accepting application');
            return;
        }

        $membership->update([
            'status' => TeamMember::REJECTED,
        ]);

        Toast::info(__('Member rejected'));
    }

    public function inviteMember(Team $team, Request $request)
    {
        if ($team->owner_id != Auth::user()->id) {
            Toast::error('You do not own the Team');
            return redirect()->route('teams.teams.list');
        }

        $user = User::findOrFail($request->get('invite')['user_id']);

        if ($user->team() !== null) {
            Toast::error('Player already belongs in a Team');
            return;
        }

        $membership = TeamMember::firstOrCreate([
            'member_id' => $user->id,
            'team_id' => $team->id
        ]);

        $membership->status = TeamMember::INVITE_PENDING;
        $membership->save();

        Toast::info('Player invited!');
    }
}
