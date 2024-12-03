<?php

namespace App\Http\Requests\Fiscal;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fm'=>['required','string','unique:fiscals,fm','min:14']
        ];
    }
    
    public function messages(){
        return [
            'fm.required'=>'FM raqami bosh bola olmaydi',
            'fm.unique'=>'Bunday FM tizimda mavjud, qayta kiritmoqchi bolayabsiz',
            'fm.min'=>'FM raqamlar soni 14 tadan kam bolmasligi kerak',
        ];
    }

}
