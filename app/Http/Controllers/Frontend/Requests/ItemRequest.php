<?php

namespace App\Http\Controllers\Frontend\Requests;

use App\Models\Item;
use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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

            'article' => [
                'required',
                'numeric',
                'unique:'.Item::class,
            ],

            'size' => [
                'required',
                'max:6'
            ],
                'product'=>[
                'required'
            ]
        ];
    }
}
