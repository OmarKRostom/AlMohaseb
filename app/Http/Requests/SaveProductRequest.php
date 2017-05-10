<?php

namespace AlMohaseb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title'              => ['required', 'min:3', 'max:255'],
            'buyingPrice'        => ['required', 'numeric', 'min:0'],
            'sellingPrice'       => ['required', 'numeric', 'min:0'],
            'category_id'        => ['required', 'exists:categories,id'],
            'available_in_stock' => ['required', 'numeric', 'min:0'],
        ];
    }

    public function attributes()
    {
        return [
            'title'              => 'Title',
            'buyingPrice'        => 'Buying Price',
            'sellingPrice'       => 'Selling Price',
            'category_id'        => 'Category',
            'available_in_stock' => 'Availble In Stock',
        ];
    }
}
