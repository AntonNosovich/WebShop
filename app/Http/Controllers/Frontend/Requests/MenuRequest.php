<?php

namespace App\Http\Controllers\Frontend\Requests;

use App\Models\Menu;
use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
                'unique:'.Menu::class,
            ],
            'route' => [
                'required',
                'unique:'.Menu::class,
            ],
           ];
    }
}
