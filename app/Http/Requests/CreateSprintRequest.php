<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateSprintRequest extends Request
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
            'sprint_name' => 'required|min:3',
            'sprint_description' => 'required|min:5',
            'deliverable' => 'required|min:5',
            'milestone' => 'required|min:5',
            'started_at' => 'required|min:6',
            'ended_at' => 'required|min:6'
        ];
    }
}
