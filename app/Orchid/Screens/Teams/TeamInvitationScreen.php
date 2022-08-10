<?php

namespace App\Orchid\Screens\Teams;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class TeamInvitationScreen extends Screen
{
    public $team_invitations;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'team_invitations' => TeamMember::where('member_id', Auth::user()->id)
                ->where('status', TeamMember::INVITE_PENDING)
                ->whereRelation('team', 'sport_id', Auth::user()->player_profile->sport_id)
                ->paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Team Invitations';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('team_invitations', [
                TD::make('name')
                    ->render(function ($membership) {
                        return $membership->team->name;
                    }),
                TD::make('Sport')
                    ->render(function ($membership) {
                        return $membership->team->sport->name;
                    }),
                TD::make(__('Actions'))
                    ->align(TD::ALIGN_CENTER)
                    ->width('100px')
                    ->render(function ($membership) {
                        return DropDown::make()
                            ->icon('options-vertical')
                            ->list(
                                [
                                    Button::make(__('Accept Invitation'))
                                        ->type(Color::SUCCESS())
                                        ->icon('check')
                                        ->method('acceptInvitation', [
                                            'membership' => $membership->id
                                        ]),
                                ]
                            );
                    }),
            ]),
        ];
    }

    public function acceptInvitation(Request $request)
    {
        if (Auth::user()->team() !== null) {
            Toast::error('You already belong to a team');
            return;
        }

        $membership = TeamMember::findOrFail($request->membership);

        if ($membership->status !== TeamMember::INVITE_PENDING) {
            Toast::error('Invitation does not exist anymore');
            return;
        }

        $membership->update([
            'status' => TeamMember::APPROVED
        ]);

        Toast::success('Invitation Accepted');

        return redirect()->route('teams.teams.view', $membership->team_id);
    }
}
