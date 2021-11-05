<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'client_id' => 'required|integer',
            'project_name' => 'required|string:255',
            'project_type' => 'required',
            'project_description' => 'required',
            'amount_charged' => 'required',
            'due_date' => 'required'
        ];
    }
}
