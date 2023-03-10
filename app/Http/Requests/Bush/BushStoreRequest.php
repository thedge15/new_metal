<?php

namespace App\Http\Requests\Bush;

use Illuminate\Foundation\Http\FormRequest;

class BushStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|unique:bushes'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Заполните данную форму',
            'title.unique' => 'Данное название уже существует'
        ];
    }
}
