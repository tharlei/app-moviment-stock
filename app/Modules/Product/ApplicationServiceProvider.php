<?php

declare(strict_types=1);

namespace App\Modules\Product;

use App\Modules\Product\Queries\FindProductWithSku\FindProductWithSkuQuery;
use App\Queries\Product\FindProductWithSku;
use App\Repositories\EloquentProductRepository;
use Illuminate\Support\ServiceProvider;

final class ApplicationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ProductRepository::class, EloquentProductRepository::class);
        $this->app->bind(FindProductWithSkuQuery::class, FindProductWithSku::class);
    }
}
