<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
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
            'bush_id' => 'required|integer',
            'title' => 'required|string|unique:projects',
        ];
    }

    public function messages(): array
    {
        return [
            'title.unique' => 'Данное название уже существует'
        ];
    }
}
