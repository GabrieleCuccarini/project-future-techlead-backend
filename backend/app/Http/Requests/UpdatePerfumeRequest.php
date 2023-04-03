<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePerfumeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|string',
            'cover_img' => 'image',
            'brand_id' => 'required|numeric|min:1',
            'quantity' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'show' => 'nullable|boolean',
        ];
    }
}
