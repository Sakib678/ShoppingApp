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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
    return [
        'title' => 'required|max:255',
        'name' => 'required|max:255',
        'price' => 'required|numeric|min:0|max:1000',
        'product_type_id' => 'required|integer',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
