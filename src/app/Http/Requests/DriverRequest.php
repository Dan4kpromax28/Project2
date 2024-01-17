<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
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
            'name' => 'required|min:3|max:256'
        ];
    }

    public function messages(){
        return [
            'required' => 'Lauks ":atribute" ir obligāts'
        ];
    }

    public function attributes(){
        return [
            'name' => 'Komandas nosaukums'
        ];
    }
}
