<?php

namespace App\Core\Http\Controllers\API\ProductStockMovement;

use App\Http\Controllers\Controller;
use App\Modules\ProductStockMovement\Actions\Create\CreateProductStockMovementAction;
use App\Modules\ProductStockMovement\Actions\Create\CreateProductStockMovementInput;
use App\Modules\ProductStockMovement\Queries\ListStockMovement\ListStockMovementQuery;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RuntimeException;

class ProductStockMovementController extends Controller
{
    private ListStockMovementQuery $listStockMovementQuery;
    private CreateProductStockMovementAction $createProductStockMovementAction;

    public function __construct(
        ListStockMovementQuery $listStockMovementQuery,
        CreateProductStockMovementAction $createProductStockMovementAction
    ) {
        $this->listStockMovementQuery = $listStockMovementQuery;
        $this->createProductStockMovementAction = $createProductStockMovementAction;
    }

    public function index(Request $request): JsonResponse
    {
        $movements = $this->listStockMovementQuery->execute(
            $request->get('paginator', false)
        );

        return response()->json($movements, 200);
    }

    public function store(StoreProductStockMovementRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $input = CreateProductStockMovementInput::fromArray($request->validated());
            $this->createProductStockMovementAction->execute($input);
        } catch (RuntimeException $exception) {
            DB::rollBack();
            return response()->json($exception->getMessage(), 400);
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Erro em CreateProductStockMovementAction@store', [$exception->getMessage()]);
            return response()->json('Tente novamente mais tarde...', 400);
        }

        DB::commit();
        Cache::forget("sku-{$request->sku}-stock-movements");
        return response()->json(null, 201);
    }
}
