<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required',
            'description' => 'required|string',
            'category_id' => 'required|int',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',

           
        ];
    }
}
