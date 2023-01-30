<?php

namespace App\Http\Requests\ProductStandard;

use Illuminate\Foundation\Http\FormRequest;

class ProductStandardRequest extends FormRequest
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
            'product_id' => 'required|integer',
            'title' => 'required|string|unique:product_standards',
        ];
    }

    public function messages(): array
    {
        return [
            'title.unique' => 'Данное название уже существует',
            'title.required' => 'Заполните данную форму',
        ];
    }
}
