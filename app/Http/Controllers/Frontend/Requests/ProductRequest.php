<?php

namespace App\Http\Controllers\Frontend\Requests;

use App\Models\Item;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                'unique:'.Product::class
                ],
            'description' => [
                'required',
                'min:3'
            ],
            'article' => [
                'required',
                'numeric',
                'unique:'.Item::class,
                ],
            'image' =>[
                'required',
//                'mimes:jpg,png,jpeg,gif,svg'
            ],
            'price' => [
                'required',
                'min:1',
                'numeric',
            ],

            'size' => [
                'required',
                'max:6'
            ],

            'category' =>
                [
                    'required'
                ]
           ];
    }
}
