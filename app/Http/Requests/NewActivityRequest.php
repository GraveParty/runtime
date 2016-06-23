<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewActivityRequest extends Request
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
            'title' => 'required|max:50',
				'introduction' => 'required|max:100',
				'start' => 'required',
				'end' => 'required|after:start',
        ];
    }
}
