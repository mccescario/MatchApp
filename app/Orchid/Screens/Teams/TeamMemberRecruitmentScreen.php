<?php

namespace App\Orchid\Screens\Teams;

use App\Models\Team;
use App\Models\TeamMember;
use App\Models\User;
use App\Orchid\Filters\Teams\MemberCourseFilter;
use App\Orchid\Layouts\Teams\MemberRecruitementFiltersLayout;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class TeamMemberRecruitmentScreen extends Screen
{
    public $team;
    public $users;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(Team $team): iterable
    {
        return [
            'team' => $team,
            // 'users' => User::has('player_profile')
            'users' => User::has('player_profile')
                ->with('player_profile')
                ->whereRelation('player_profile', 'sport_id', $team->sport_id)
                ->whereDoesntHave('memberships', function (Builder $query) {
                    return $query->whereIn('status', [TeamMember::APPROVED, TeamMember::OWNER]);
                })
                ->filtersApplySelection(MemberRecruitementFiltersLayout::class)
                ->simplePaginate(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return __('Member Recruitment: ') . $this->team->name;
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
            MemberRecruitementFiltersLayout::class,
            Layout::table('users', [
                TD::make('name', 'Name'),
                TD::make('course')
                    ->render(function ($user) {
                        return $user->player_profile->course->name;
                    }),
                TD::make('role')
                    ->render(function ($user) {
                        return $user->player_profile->sport_role?->name;
                    }),
                TD::make(__('Actions'))
                    ->align(TD::ALIGN_CENTER)
                    ->width('100px')
                    ->render(function ($user) {
                        return DropDown::make()
                            ->icon('options-vertical')
                            ->list(
                                [
                                    Button::make(__('Recruit Player'))
                                        ->type(Color::SUCCESS())
                                        ->icon('check')
                                        ->method('recruitPlayer', [
                                            'user' => $user->id
                                        ]),
                                ]
                            );
                    }),
            ]),
        ];
    }

    public function recruitPlayer(Team $team, Request $request)
    {
        if ($team->owner_id != Auth::user()->id) {
            Toast::error('You do not own the Team');
            return redirect()->route('teams.teams.list');
        }

        $user = User::findOrFail($request->user);

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
