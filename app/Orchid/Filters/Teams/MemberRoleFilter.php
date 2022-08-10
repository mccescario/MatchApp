<?php

namespace App\Orchid\Filters\Teams;

use App\Models\SportRole;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;

class MemberRoleFilter extends Filter
{

    /**
     * The displayable name of the filter.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Filter By Role';
    }

    /**
     * The array of matched parameters.
     *
     * @return array|null
     */
    public function parameters(): ?array
    {
        return ['sport_role_id'];
    }

    /**
     * Apply to a given Eloquent query builder.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        // return $builder->whereRelation('player_profile', 'sport_role_id', $this->request->get('sport_role_id'));
        return $builder->whereHas('player_profile', function (Builder $query) {
            return $query->where('sport_role_id', $this->request->get('sport_role_id'));
        });
    }

    /**
     * Get the display fields.
     *
     * @return Field[]
     */
    public function display(): iterable
    {
        return [
            Select::make('sport_role_id')
                ->fromModel(SportRole::class, 'name')
                ->empty()
                ->value($this->request->get('sport_role_id'))
                ->title(__('Sport Role')),
        ];
    }
}
