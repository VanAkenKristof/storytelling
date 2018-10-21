<?php

namespace App\Rules;

use App\ClassModel;
use Illuminate\Contracts\Validation\Rule;

class SelectedSubclass implements Rule
{
    /**
     * @var ClassModel
     */
    private $class;

    /**
     * Create a new rule instance.
     *
     * @param ClassModel $class
     */
    public function __construct($class)
    {
        $this->class = $class;
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
        return $value[$this->class] != null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The subclass field is required.';
    }
}
