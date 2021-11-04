<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        // Check if method POST || PUT

      
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            return [
                'name' => 'sometimes|array',
                'description' => 'sometimes|array',
                'parent_id' => 'sometimes'
            ];
        }
        return [
            'name' => 'required|array',
            'description' => 'sometimes|array',
            'parent_id' => 'sometimes'
        ];
    }
}
