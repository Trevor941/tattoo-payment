<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'customername' => 'required|max:255',
             'email' => 'required|email|max:255',
             'phone' => 'required|digits:10',
             'date' => 'required|date|after:tomorrow'
        ];
    }


    public function messages()
    {
        return [
            'customername.required' => 'Customer name is required',
             'date' => 'Select a date other than today'
        ];

    }
}
