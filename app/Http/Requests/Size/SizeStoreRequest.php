<?php

namespace App\Http\Requests\Size;

use Illuminate\Foundation\Http\FormRequest;

class SizeStoreRequest extends FormRequest
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
            'size' => 'required|string|unique:sizes',
        ];
    }

    public function messages(): array
    {
        return [
            'size.required' => 'Заполните данную форму',
            'size.unique' => 'Данное название уже существует',
        ];
    }
}
