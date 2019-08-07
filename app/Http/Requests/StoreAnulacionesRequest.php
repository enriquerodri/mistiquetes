<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnulacionesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() 
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'm_canombr' => 'required|unique:capmanul,m_canombr',
            'm_cacodna' => 'required',
            'm_caaplic' => 'required',
            'm_caestad' => 'required',
            'm_caanure' => 'required'
        ];
    }
}
