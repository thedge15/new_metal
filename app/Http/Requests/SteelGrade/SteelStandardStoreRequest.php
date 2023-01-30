<?php

namespace App\Http\Requests\SteelGrade;

use Illuminate\Foundation\Http\FormRequest;

class SteelStandardStoreRequest extends FormRequest
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
            'steel_grade_id' => 'required|integer',
            'title' => 'required|string',
        ];
    }
}
