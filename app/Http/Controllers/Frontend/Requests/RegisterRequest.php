<?php

namespace App\Http\Controllers\Frontend\Requests;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
class RegisterRequest extends FormRequest
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
                'unique:'.User::class,
            ],
            'password' => [
                'required',
                'string',
                'min:6',
            ],
            'password_confirmation' => 'required|same:password'
        ];
    }
}
