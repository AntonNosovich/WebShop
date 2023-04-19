<?php

namespace App\Http\Controllers\Frontend\Requests;

use App\Models\Item;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
                  'max:50',
                'unique:products,name,'.$this->product->id.',id'
        ],
            'description' => [
                'required',
                'min:3'
            ],

            'image' =>[
//                'mimes:jpg,png,jpeg,gif,svg'
            ],
            'price' => [
                'required',
                'min:1',
                'numeric',
            ],

           ];
    }
}
