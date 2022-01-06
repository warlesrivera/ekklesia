<?php

namespace App\Modulos\Blog\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rule = [
            'contactEmail'      => 'required|email',
            'billingEmail'      => 'required|email',
        ];

        if ($this->listContactPhone) {

            $rule['listContactPhone.*.countryContact']    = 'required';
            $rule['listContactPhone.*.phoneTypeContact']  = 'required';
            $rule['listContactPhone.*.phoneContact']      = 'required|max:10|min:8|regex:/^[0-9]+$/';
            $rule['listContactPhone.*.extensionContact']  = 'max:3';
        }

        return $rule;
    }

    public function messages(): array
    {

        return [
            'listContactPhone.*.countryContact.required'    => 'Pais de Contacto requerido',
            'listContactPhone.*.phoneTypeContact.required'  => 'Tipo de Telefono de Contacto requerido',
            'listContactPhone.*.phoneContact.required'      => 'Teléfono requerido',
            'listContactPhone.*.phoneContact.max'           => 'Teléfono máximo 10 caracteres',
            'listContactPhone.*.phoneContact.min'           => 'Teléfono mínimo 8 caracteres',
            'listContactPhone.*.phoneContact.regex'         => 'Teléfono sólo se permiten números',
            'listContactPhone.*.extensionContact.max'       => 'Extension máximo 3 caracteres',
            'contactEmail.required'                         => 'Email de Contacto requerido',
            'contactEmail.email'                            => 'Email de Contacto inválido',
            'billingEmail.required'                         => 'Email de facturación requerido',
            'billingEmail.email'                            => 'Email de facturación inválido'
        ];
    }
}
