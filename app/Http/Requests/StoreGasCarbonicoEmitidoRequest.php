<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGasCarbonicoEmitidoRequest extends FormRequest
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
            'id_combustivels' => 'required',
            'qtd_listros' => 'required',
            'qtd_km' => 'required',
        ];
    }

    public function messages(): array {

        return [
            "id_combustivels.required" => "Informe o Combustivel.",
            "qtd_listros.required" => "Informe a quantidade de Litros.",
            "qtd_km.required" => "Informe o KM.",
        ];
    }
}
