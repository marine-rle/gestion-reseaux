<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Silber\Bouncer\Bouncer;

class OrdinateurRequest extends FormRequest
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
            'num_serie' => 'required|number|max:75',
            'modele' => 'required|string|max:75',
            'marque' => 'required|string|max:75',
            'date_service' => 'required',
            'reseau' => 'required',
        ];
    }
}
