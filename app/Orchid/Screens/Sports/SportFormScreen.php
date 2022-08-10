<?php

namespace App\Orchid\Screens\Sports;

use App\Models\Sport;
use App\Orchid\Layouts\Sports\SportsFormLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class SportFormScreen extends Screen
{
    public $sport;
    /**
     * Query data.
     *
     * @return array
     */
    public function query(Sport $sport): iterable
    {
        return [
            'sport' => $sport
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->sport->exists ?
            _('Edit ') . $this->sport->name :
            _('Register New Sport');
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
            SportsFormLayout::class,
        ];
    }

    public function createOrUpdateSport(Sport $sport, Request $request)
    {
        // dd($request->all());
        if ($sport->id) {
            $sport->update($request->get('sport'));
            Toast::success('You have successfully updated sport');
        } else {
            Sport::create($request->get('sport'));
            Toast::success('You have successfully updated sport');
        }

        return redirect()->route('sports.sports.list');
    }

    public function permission(): ?iterable
    {
        return [
            'admin'
        ];
    }
}
