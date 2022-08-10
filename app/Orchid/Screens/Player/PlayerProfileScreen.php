<?php

namespace App\Orchid\Screens\Player;

use App\Orchid\Layouts\PlayerProfile\CourseFormLayout;
use App\Orchid\Layouts\PlayerProfile\SportFormLayout;
use App\Orchid\Layouts\PlayerProfile\SportRoleFormLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class PlayerProfileScreen extends Screen
{
    public $profile;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        $player_profile = Auth::user()->player_profile;

        return [
            'student_profile' =>  $player_profile,
            'sport_profile' =>  $player_profile,
            'sport_role_profile' =>  $player_profile,
            'sport_id' =>  $player_profile->sport_id,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Player Profile';
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
            Layout::block(CourseFormLayout::class)
                ->title(__('Student Profile'))
                ->description(__("Update your student profile"))
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::SUCCESS())
                        ->icon('check')
                        ->method('save_student_profile')
                ),
            Layout::block(SportFormLayout::class)
                ->title(__('Sport'))
                ->description(__("Update your sport"))
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::SUCCESS())
                        ->icon('check')
                        ->method('save_sport_profile')
                ),
            Layout::block(SportRoleFormLayout::class)
                ->title(__('Sport Role'))
                ->description(__("Update your role"))
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::SUCCESS())
                        ->icon('check')
                        ->method('save_sport_role_profile')
                ),
        ];
    }

    public function save_student_profile(Request $request)
    {
        $request->validate([
            'student_profile.course_id' => 'required|integer',
            'student_profile.student_number' => 'required',
        ]);

        Auth::user()->player_profile()->update($request->get('student_profile'));

        Toast::info(__('Student Profile Updated.'));
    }

    public function save_sport_profile(Request $request)
    {
        $request->validate(([
            'sport_profile.sport_id' => 'required|integer'
        ]));

        if (Auth::user()->player_profile->sport_id != $request->get('sport_profile')['sport_id']) {
            Auth::user()->player_profile()->update([
                'sport_role_id' => null
            ]);
        }

        Auth::user()->player_profile()->update($request->get('sport_profile'));

        Toast::info(__('Sport Updated.'));
    }

    public function save_sport_role_profile(Request $request)
    {
        $request->validate(([
            'sport_role_profile.sport_role_id' => 'required'
        ]));

        Auth::user()->player_profile()->update($request->get('sport_role_profile'));

        Toast::info(__('Sport Role Updated.'));
    }

    public function permission(): ?iterable
    {
        return [
            'player'
        ];
    }
}
