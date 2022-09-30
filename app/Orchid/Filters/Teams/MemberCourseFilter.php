<?php

namespace App\Orchid\Filters\Teams;

use App\Models\Course;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;

class MemberCourseFilter extends Filter
{
    /**
     * The displayable name of the filter.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Filter By Course';
    }

    /**
     * The array of matched parameters.
     *
     * @return array|null
     */
    public function parameters(): ?array
    {
        return ['course_id'];
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
        // return $builder->whereRelation('player_profile', 'course_id', $this->request->get('course_id'));
        return $builder->whereHas('player_profile', function (Builder $query) {
            return $query->where('course_id', $this->request->get('course_id'));
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
            Select::make('course_id')
                ->fromModel(Course::class, 'name', 'id')
                ->empty()
                ->value($this->request->get('course_id'))
                ->title(__('Course')),
        ];
    }
}
