<?php

namespace App\Core\Http\Controllers\API\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => "required|string",
            "sku" => "required|string",
            "amount" => "required|numeric",
        ];
    }

    public function attributes(): array
    {
        return [
            "name" => "Nome",
            "sku" => "SKU",
            "amount" => "Quantidade",
        ];
    }

    public function messages()
    {
        return [
            "required" => "Campo obrigatório",
        ];
    }
}
