<?php

namespace App\Orchid\Layouts\PlayerProfile;

use App\Models\Course;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Relation;


class CourseFormLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [
            Input::make('student_profile.student_number')
                ->title('Student Number')
                ->type('text')
                ->required(),
            Relation::make('student_profile.course_id')
                ->title('Course')
                // ->required()
                ->value($this->query->get('student_profile.course_id'))
                ->fromModel(Course::class, 'name')
        ];
    }
}
