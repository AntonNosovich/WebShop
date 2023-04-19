<?php

namespace App\Http\Controllers\Frontend\Requests;

use App\Models\Advertising;
use Illuminate\Foundation\Http\FormRequest;

class AdvertisingRequest extends FormRequest
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
                'unique:'.Advertising::class,
            ],
            'image' => [
                'required',
            ],
            'item_id' =>[
                'required',
            ],
            ];
    }
}
