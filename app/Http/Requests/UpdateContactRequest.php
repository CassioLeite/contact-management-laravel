<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContactRequest extends FormRequest
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
        $contact = $this->route('contact');
        $contactId = is_object($contact) ? $contact->id : $contact;

        return [
            'name' => ['required', 'string', 'min:6'],
            'contact' => [
                'required',
                'digits:9',
                Rule::unique('contacts', 'contact')->ignore($contactId),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('contacts', 'email')->ignore($contactId),
            ],
        ];
    }
}
