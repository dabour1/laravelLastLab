<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Assume the authorization logic here (e.g., only authenticated users can store students)
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Retrieve the student ID from the route, if available
        

        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:20',
                
            ],
            'address' => [
                'required',
                'string',
                'max:255',
                
            ],
            'age' => 'required|integer',
            'image' => 'image|mimes:jpg,png|max:2048',
            
            
        ];
    }
}
