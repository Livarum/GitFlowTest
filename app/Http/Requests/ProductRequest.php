<?php

namespace App\Http\Requests;

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
        return true; // Adjust authorization logic if needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'provider_id' => 'required|integer',
            'type_id' => 'required|integer',
            'container_id' => 'required|integer',
            // Add other validation rules as needed
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The product name is required.',
            'description.required' => 'The product description is required.',
            'price.required' => 'The product price is required.',
            'price.numeric' => 'The product price must be a number.',
            'provider_id.required' => 'The provider ID is required.',
            'provider_id.integer' => 'The provider ID must be an integer.',
            'type_id.required' => 'The type ID is required.',
            'type_id.integer' => 'The type ID must be an integer.',
            'container_id.required' => 'The container ID is required.',
            'container_id.integer' => 'The container ID must be an integer.',
            // Add custom messages for other validation rules as needed
        ];
    }
    
}

