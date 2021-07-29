<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'        => 'required',
            'last_name'         => 'required',
            'document'          => 'required|numeric|digits:10|unique:pruebas,document',
            'email'             => 'required|email|unique:pruebas,email',
            'phone'             => 'required|numeric|digits:9',
            'mobile_phone'      => 'required|numeric|digits:10',
            'address'           => 'required',
            'birthdate'         => 'required|date|date_format:Y-m-d',
            'second_name'       => 'required',
            'second_last_name'  => 'required',
        ];
    }

    /**
     * Cambio de nombre a los atributos
     *
     * @return void
     */
    public function attributes()
    {
        return [
            'first_name'        => 'Primer Nombre',
            'last_name'         => 'Primer Apellidos',
            'document'          => 'Cédula',
            'email'             => 'E-mail',
            'phone'             => 'Teléfono',
            'mobile_phone'      => 'Celular',
            'address'           => 'Dirección',
            'birthdate'         => 'Fecha de Nacimiento',
            'second_name'       => 'Segundo Nombre',
            'second_last_name'  => 'Segundo Apellido',
        ];
    }

    /**
     * Mensajes personalizados de validación
     *
     * @return void
     */
    public function messages()
    {
        return [
            'first_name.required'       => 'El :attribute es obligarotio.',
            'last_name.required'        => 'El :attribute es obligarotio.',
            'document.required'         => 'La :attribute es obligarotia.',
            'document.numeric'          => 'La :attribute debe ser un tipo numérico',
            'document.digits'           => 'La :attribute no debe tener menos ni pasar de 10 números',
            'document.unique'           => 'La :attribute ya existe',
            'email.required'            => 'El :attribute es obligarotio.',
            'email.unique'              => 'El :attribute ya existe',
            'email.email'               => 'El :attribute debe ser tipo :attribute',
            'phone.required'            => 'El :attribute es obligarotio.',
            'phone.digits'              => 'La :attribute no debe tener menos ni pasar de 10 números.',
            'phone.numeric'             => 'EL :attribute debe ser un tipo numérico.',
            'mobile_phone.required'     => 'El :attribute es obligarotio.',
            'mobile_phone.digits'       => 'La :attribute no debe tener menos ni pasar de 10 números.',
            'mobile_phone.numeric'      => 'EL :attribute debe ser un tipo numérico.',
            'address.required'          => 'La :attribute es obligarotia.',
            'birthdate.required'        => 'La :attribute es obligatorio.',
            'birthdate.date'            => 'La :attribute de ser un tipo fecha.',
            'birthdate.date_format'     => 'La :attribute de tener un formato ej: 1994-04-12.',
            'second_name.required'      => 'El :attribute es obligarotio.',
            'required.required'         => 'El :attribute es obligarotio.',
        ];
    }
}
