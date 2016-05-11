<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateTaskRequest extends Request
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
            'task_name' => 'required|min:3',
            'description' => 'required|min:5',
            'deliverable'=> 'required|min:5',
            'task_status' => 'required',
            'started_at' => 'required',
            'ended_at' => 'required',
        ];
    }
}
