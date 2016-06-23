<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PersonalModifyRequest extends Request
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
            'nickname' => 'required|max:20',
				'tel' => 'required|min:11|max:11',
				'sex' => 'required',
        ];
    }
}
