<?php

namespace Src\Application\Http\Requests\Counter;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CounterToTeamCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'team_id' => ['required', Rule::exists('teams', 'id')],
            'name' => ['required']
        ];
    }
}
