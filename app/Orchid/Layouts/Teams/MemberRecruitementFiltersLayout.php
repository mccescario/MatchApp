<?php

namespace App\Orchid\Layouts\Teams;

use App\Orchid\Filters\Teams\MemberCourseFilter;
use App\Orchid\Filters\Teams\MemberRoleFilter;
use Orchid\Filters\Filter;
use Orchid\Screen\Layouts\Selection;

class MemberRecruitementFiltersLayout extends Selection
{
    /**
     * @return Filter[]
     */
    public function filters(): iterable
    {
        return [
            MemberCourseFilter::class,
            MemberRoleFilter::class,
        ];
    }
}
