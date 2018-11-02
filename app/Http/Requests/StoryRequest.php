<?php

namespace App\Http\Requests;

use App\Rules\SelectedSubclass;
use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
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
            'race' => 'required',
            'class' => 'required',
            'subclass' => ['required', new SelectedSubclass(request()->class)],
            'background' => 'required',
            'name' => 'required',
            'age' => 'required|integer',
            'backstory' => 'required',
        ];
    }
}
