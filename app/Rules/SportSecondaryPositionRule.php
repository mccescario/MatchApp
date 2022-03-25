<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SportSecondaryPositionRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value != $this->user->sport->sport_primary_position_id;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be different from primary position.';
    }
}
