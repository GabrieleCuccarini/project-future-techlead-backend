<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePerfumeRequest extends FormRequest
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
            'cover_img' => 'required|image',
            'brand' => 'required|max:255|string',
            'quantity' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'show' => 'nullable|boolean',
        ];
    }
}
