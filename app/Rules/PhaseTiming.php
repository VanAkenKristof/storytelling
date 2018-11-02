<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class PhaseTiming implements Rule
{
    private $firstStart;

    /**
     * Create a new rule instance.
     *
     * @param $firstStart
     */
    public function __construct($firstStart)
    {
        $this->firstStart = $firstStart;
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
        $start = $this->getCarbon($this->getStart($value));
        $end = $this->getCarbon($this->firstStart);

        if ($end >= $start) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The start of :attribute has to be earlier than the phase before.';
    }

    private function getCarbon($date)
    {
        $date = explode("/", $date);

        return Carbon::createFromDate($date[2], $date[1], $date[0])->startOfDay();
    }

    private function getStart($date)
    {
        return explode(" - ", $date)[0];
    }
}
