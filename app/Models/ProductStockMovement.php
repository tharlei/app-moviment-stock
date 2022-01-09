<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ProductStockMovement extends Model
{
    use Uuids, HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'sku',
        'amount',
        'is_add',
        'created_at'
    ];

    protected $casts = [
        "id" => "string",
        "sku" => "string",
        "amount" => "int",
        "is_add" => "boolean",
        'created_at' => 'datetime',
    ];

    public $timestamps = false;

    public function product() {
        return $this->belongsTo(Product::class, 'sku', 'sku');
    }
}
