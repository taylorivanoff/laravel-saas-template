<?php

namespace Template\Domain\Account\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Template\Domain\Auth\Rules\CurrentPassword;

class ProfileStoreRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'avatar' => 'image',
            'phone' => [
                'nullable', 'string',
                Rule::unique('users', 'phone')->ignore(auth()->id())
            ],
            
        ];
    }
}
