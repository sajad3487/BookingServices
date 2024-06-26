<?php

namespace Modules\Category\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                    'title' => 'required| string',
                    'description' => 'string',
                    'parent_id' => 'exists:categories,id',
                    'price' => 'required|numeric',
                    'status' => 'required| numeric|between:0,4',
                    'public' => 'numeric|between:0,1',
                ];
            case 'PUT' || 'PATCH':
                return [
                    'title' => 'string',
                    'description' => 'string',
                    'parent_id' => 'exists:categories,id',
                    'price' => 'numeric',
                    'status' => ' numeric|between:0,4',
                    'public' => ' numeric|between:0,1',
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
