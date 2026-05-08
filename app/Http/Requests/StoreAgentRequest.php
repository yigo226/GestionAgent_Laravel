<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAgentRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'nom' => 'required|string|max:255',

            'prenom' => 'required|string|max:255',

            'telephone' => 'required|string|max:20',

            'email' => 'required|email|unique:agents,email',

            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'date_naissance' => 'nullable|date',

            'sexe' => 'nullable|in:M,F',

            'date_recrutement' => 'nullable|date',

            'statut' => 'required|in:actif,inactif',

            'adresse' => 'nullable|string',

            'service_id' => 'required|exists:services,id',

            'poste_id' => 'required|exists:postes,id',
        ];
    }
}
