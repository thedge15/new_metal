<?php

namespace App\Http\Requests\Metal;

use Illuminate\Foundation\Http\FormRequest;

class MetalStoreRequest extends FormRequest
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
            'title' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Заполните данную форму',
        ];
    }
}
