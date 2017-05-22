<?php

namespace AlMohaseb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            'type'                          => ['required', 'in:selling,purchasing'],
            'responsible_id'                => ['required', "exists:" . (request()->type === 'selling' ? 'customers' : 'agents') . ",id"],
            'selected_products'             => ['required', 'array', 'min:1'],
            'selected_products.*.productId' => ['required', 'exists:products,id'],
            'selected_products.*.quantity'  => ['required', 'integer', 'min:1'],
        ];
    }

    public function attributes()
    {
        return [
            'responsible_id'                => (request()->type === 'selling' ? 'Customer' : 'Agent'),
            'selected_products'             => 'Selected Products',
            'selected_products.*.productId' => 'Product',
            'selected_products.*.quantity'  => 'Quantity',
        ];
    }
}
