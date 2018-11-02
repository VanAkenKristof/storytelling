<?php

namespace App\Http\Requests;

use App\Rules\PhaseTiming;
use Illuminate\Foundation\Http\FormRequest;

class PhaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "phase1" => ["required"],
            "phase2" => ["required", new PhaseTiming($this->getEnd($this->request->get('phase1')))],
            "phase3" => ["required", new PhaseTiming($this->getEnd($this->request->get('phase2')))],
            "phase4" => ["required", new PhaseTiming($this->getEnd($this->request->get('phase3')))],
        ];
    }

    private function getEnd($value)
    {
        return explode(" - ", $value)[1];
    }
}
