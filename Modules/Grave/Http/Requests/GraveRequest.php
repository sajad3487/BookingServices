<?php

namespace Modules\Grave\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GraveRequest extends FormRequest
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
                    'user_id' => 'required|exists:users,id',
                    'state' => 'required | string',
                    'city' => 'required|string',
                    'cemetery' => 'required| string',
                    'segment' => 'string',
                    'line' => 'numeric',
                    'number' => 'numeric',
                    'name' => 'required|string',
                ];
            case 'PUT' || 'PATCH':
                return [
                    'state' => 'string',
                    'city' => 'string',
                    'cemetery' => ' string',
                    'segment' => 'string',
                    'line' => 'numeric',
                    'number' => 'numeric',
                    'name' => 'string',
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
