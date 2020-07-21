<?php

namespace Modules\Order\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'category'=>'required|array',
                    'category.*'=>'required|exists:categories,id|numeric',
                ];
            case 'PUT' :
                return [
                    'grave_id'=>'numeric|exists:graves,id',
                    'payment_id'=>'string',
                    'payment_date'=>'date',
                    'discount_code'=>'string | exists:discounts,code',
                    'discount'=>'numeric',
                    'net_price'=>'numeric',
                    'total_price'=>'numeric',
                ];
                break;
            case 'PATCH':
                return [
                    'grave_id'=>'required|numeric|exists:graves,id',
                    'category'=>'array',
                    'category.*'=>'exists:categories,id|numeric',
                ];
                break;
        }
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
