<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{
    use Uuids, HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'name',
        'sku',
        'amount',
    ];

    protected $casts = [
        "id" => "string",
        "name" => "string",
        "sku" => "string",
        "amount" => "int",
    ];
}
