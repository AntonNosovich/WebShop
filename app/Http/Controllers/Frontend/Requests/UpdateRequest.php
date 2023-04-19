<?php

namespace App\Http\Controllers\Frontend\Requests;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
class UpdateRequest extends FormRequest
{
    private mixed $role;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
            ],

            'lastname' => [
                'required',
                'string',
            ],

            'address' => [
                'required',
                'string',
            ],

            'email' => [
                'required',
                'email',
                'unique:users,email,'.$this->user->id.',id'
            ],
        ];
    }
}
