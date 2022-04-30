<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return [
            'name' => ['required'],
            'category_id' => ['required'],
            'price' => ['required','numeric'],
            'quantity' => ['required','numeric'],
            'description' => ['required', 'max:255'],
            'details' => ['required', 'max:255'],
            'weight' => ['required', 'numeric'],
        ];
    }
}
