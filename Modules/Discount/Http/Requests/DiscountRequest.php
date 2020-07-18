<?php

namespace Modules\Discount\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Discount\Rules\isDepartmentRule;

class DiscountRequest extends FormRequest
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
                    'title' => 'required|unique:discounts,title',
                    'code' => 'max:20|unique:discounts,code',
                    'amount' => ['required', 'numeric', 'min:0'],
                    'amount_type' => 'required|string',
                    'min_amount' => 'numeric',
                    'max_amount' => 'numeric',
                    'department_id' => 'nullable',
                    'status' => 'required|numeric|boolean',
                    'use_limit' => 'required|numeric',
                    'used_count' => 'required|numeric',
                    'start_time' => 'required|date|after_or_equal:today',
                    'finish_time' => 'required|date|after_or_equal:today',
                ];
            case 'PUT':
                return [
                    //
                ];
                break;

            case 'PATCH':
                return [
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
