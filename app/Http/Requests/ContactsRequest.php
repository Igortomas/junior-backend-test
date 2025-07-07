<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactsRequest extends FormRequest
{

    public function prepareForValidation(): void
    {
        $this->merge([
            'phone' => preg_replace('/\D/', '', $this->phone),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $contactId = $this->route('id');
        
        return [
            'name' => ['required', 'string', 'min:3'],
            'email' => [
                'required',
                'email',
                Rule::unique('contacts', 'email')->ignore($contactId),
            ],
            'phone' => ['required', 'digits_between:10,11'],
        ];
        
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.min' => 'O nome deve ter pelo menos 3 caracteres.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'O e-mail deve ser válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',
            'phone.required' => 'O telefone é obrigatório.',
            'phone.digits_between' => 'Número invalido.',
        ];
    }

}