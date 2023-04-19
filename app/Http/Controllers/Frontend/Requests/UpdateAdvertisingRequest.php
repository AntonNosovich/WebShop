<?php

namespace App\Http\Controllers\Frontend\Requests;

use App\Models\Advertising;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAdvertisingRequest extends FormRequest
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
            'category_id' => [
                'required',
                'unique:advertisings,category_id,'.$this->advertising->id.',id',
        ],


            'item_id' =>[
                'required',
            ],
            ];
    }
}
