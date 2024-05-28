<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
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
        return match($this->method()){
            'POST' => $this->store(),
            'PUT', 'PATCH' => $this->update(),
        };
    }

    public function store(){
        return [
            'title' => 'required',
            'status' => 'required',
            'description' => 'nullable',
        ];
    }

    public function update(){
        return [
            // 
        ];
    }


    /**
     * Get the messages that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages(){
        return [
            // 
        ];
    }
}
