<?php

namespace App\Core\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Modules\Product\Actions\Create\CreateProductAction;
use App\Modules\Product\Actions\Create\CreateProductInput;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use RuntimeException;

class ProductController extends Controller
{
    private CreateProductAction $createProductAction;

    public function __construct(
        CreateProductAction $createProductAction
    ) {
        $this->createProductAction = $createProductAction;
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        try {
            $input = CreateProductInput::fromArray($request->validated());
            $this->createProductAction->execute($input);
        } catch (RuntimeException $exception) {
            return response()->json($exception->getMessage(), 400);
        } catch (Exception $exception) {
            Log::error('Erro em CreateProductAction@store', [$exception->getMessage()]);
            return response()->json('Tente novamente mais tarde...', 400);
        }

        return response()->json(null, 201);
    }
}
