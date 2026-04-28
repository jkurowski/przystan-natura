<?php

namespace App\Http\Requests;

use App\Rules\ReCaptchaV3;
use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email:rfc',
            'message' => 'required',
            'phone' => 'required',
            'page' => '',
            'rule_1' => 'integer',
            'rule_2' => 'integer',
            'rule_6' => 'integer',
            'investment_name' => 'sometimes|string|max:255',
            'property_name' => 'sometimes|string|max:255',
            'investment_id' => 'sometimes|integer',
            'g-recaptcha-response' => ['required', new ReCaptchaV3()]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Podaj imię',
            'email.required' => 'Podaj adres e-mail',
            'email.email' => 'Podaj poprawny adres e-mail',
            'message.required' => 'Wpisz wiadomość',
            'phone.required' => 'Podaj numer telefonu',
            'g-recaptcha-response.required' => 'Potwierdź, że nie jesteś robotem',

            'rule_1.integer' => 'Nieprawidłowa wartość',
            'rule_2.integer' => 'Nieprawidłowa wartość',
            'rule_6.integer' => 'Nieprawidłowa wartość',
            'investment_id.integer' => 'Nieprawidłowa wartość',

            'investment_name.max' => 'Nazwa inwestycji może mieć maksymalnie 255 znaków',
            'property_name.max' => 'Nazwa nieruchomości może mieć maksymalnie 255 znaków',
        ];
    }
}
