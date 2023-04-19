<?php

namespace App\Http\Controllers\Frontend\Requests;

use App\Models\ClientMenu;
use App\Models\Menu;
use Illuminate\Foundation\Http\FormRequest;

class ClientMenuRequest extends FormRequest
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
                'min:3',
                'max:60',
                'unique:'.ClientMenu::class,
            ],
            'slag' => [
                'required',
                'string'
            ],
        ];
    }
}