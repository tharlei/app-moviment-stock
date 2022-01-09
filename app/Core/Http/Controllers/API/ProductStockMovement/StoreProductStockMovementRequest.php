<?php

namespace App\Core\Http\Controllers\API\ProductStockMovement;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductStockMovementRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "sku" => "required|string",
            "amount" => "required|numeric",
            "is_add" => "boolean"
        ];
    }

    public function attributes(): array
    {
        return [
            "sku" => "SKU",
            "amount" => "Quantidade",
            "is_add" => "É incremento",
        ];
    }

    public function messages()
    {
        return [
            "required" => "Campo obrigatório",
        ];
    }
}
