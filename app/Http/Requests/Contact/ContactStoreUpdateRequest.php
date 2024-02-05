<?php

namespace App\Http\Requests\Contact;

use App\Models\Contact;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ContactStoreUpdateRequest extends FormRequest
{
    /**
     * Determine if the contact is authorized to make this request.
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
        $rules = [
            'name' => 'required|string|min:5|max:255',
            'contact' => 'required|numeric|digits:9',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('App\Models\Contact', 'email'),
            ],
        ];

        if ($this->getMethod() === 'PUT') {
            $contactId = $this->id;
            $rules['email'] = [
                'required',
                'email',
                'max:255',
                Rule::unique('App\Models\Contact', 'email')->ignore($contactId),
            ];
        }


        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O campo Nome é obrigatório.',
            'name.string' => 'O campo Nome deve ser uma string.',
            'name.min' => 'O campo Nome deve ter no mínimo :min caracteres.',
            'name.max' => 'O campo Nome deve ter no máximo :max caracteres.',
            'contact.required' => 'O campo Contacto é obrigatório.',
            'contact.numeric' => 'O campo Contacto deve ser um número.',
            'contact.digits' => 'O campo Contacto deve ter :digits dígitos.',
            'email.required' => 'O campo Email é obrigatório.',
            'email.email' => 'O campo Email deve ser um email válido.',
            'email.max' => 'O campo Email deve ter no máximo :max caracteres.',
            'email.unique' => 'O campo Email já está em uso.',
        ];
    }
}
