<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMissionRequest extends FormRequest
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
            'mission_description' => 'sometimes|required|max:255',
            'progression' => 'sometimes|integer|required|max:255',
            'stage' => 'sometimes|required|integer|max:255',
            'mission_img' => 'sometimes|required|max:255',
        ];
    }
}
