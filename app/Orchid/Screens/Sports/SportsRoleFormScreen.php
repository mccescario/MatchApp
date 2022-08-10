<?php

namespace App\Orchid\Screens\Sports;

use App\Models\Sport;
use App\Models\SportRole;
use App\Orchid\Layouts\Sports\SportsRoleFormLayout;
use Illuminate\Http\Request;
use Orchid\Platform\Models\Role;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class SportsRoleFormScreen extends Screen
{
    public $sport;
    public $role;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Sport $sport, SportRole $sportRole): iterable
    {
        return [
            'sport' => $sport,
            'role' => $sportRole,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->role->exists ?
            __('Edit ') . $this->role->name :
            __('Add Role for Sport ') . $this->sport->name;
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
            SportsRoleFormLayout::class,
        ];
    }

    public function createOrUpdateSportRole(Request $request)
    {
        $request->validate([
            'role.name' => 'required|max:255'
        ]);

        if ($request->has('role_id')) {
            $role = SportRole::find($request->role_id);
            $role->update($request->get('role'));
            Toast::success('You have successfully updated role');
        } else {
            $sport = Sport::find($request->sport_id);
            $sport->roles()->create($request->get('role'));
            Toast::success('You have successfully add role to sport');
        }

        return redirect()->route('sports.roles.list', $request->sport_id);
    }

    public function permission(): ?iterable
    {
        return [
            'admin'
        ];
    }
}
