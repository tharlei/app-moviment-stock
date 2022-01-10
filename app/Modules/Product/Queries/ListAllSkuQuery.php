<?php

namespace App\Modules\Product\Queries;

use Illuminate\Support\Collection;

interface ListAllSkuQuery
{
    public function execute(): Collection;
}
