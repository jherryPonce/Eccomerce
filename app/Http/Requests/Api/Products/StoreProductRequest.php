<?php

namespace App\Http\Requests\Api\Products;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'              => 'required|string|max:255',
            'slug'              => 'required',
            'description'       => 'required|string|max:200',
            'priceV'            => 'required |numeric',
            'priceC'            => 'required |numeric',
            'subcategory_id'    => 'required| numeric',
            'brand_id'          => 'numeric',
            'quantity'          => 'numeric',
            'cant_min'          => 'numeric',
            'SKU'               => 'string',
            'tasaC'             => 'numeric',
            'Pdolares'          => 'numeric'

        ];
    }
}
