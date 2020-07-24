<?php

namespace Modules\Financial\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WalletRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        switch ($this->method()){
            case 'POST':
                return [
                    'user_id'=>'required|exists:users,id',
                ];

            case  'PUT' :
                return [
                    'user_id'=>'numeric|exists:users,id',
                    'total_amount'=>'numeric',
                    'total_count'=>'numeric',
                ];
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
