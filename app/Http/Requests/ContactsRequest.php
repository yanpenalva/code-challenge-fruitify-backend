<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactsRequest extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        $contactId = $this->route('contact');

        return [
            'name' => 'required|string|min:3',
            'email' => [
                'required',
                'email',
                Rule::unique('contacts', 'email')->ignore($contactId),
            ],
            'phone' => 'required|string|min:10',
        ];
    }
}
