<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'sku',
        'description',
        'price',
        'quantity',
        'image'
    ];

    protected $casts = [
        'image' => 'array',
    ];

    public function stockIn()
    {
        return $this->hasOne(StockIn::class);
    }
    public function stockOut()
    {
        return $this->hasOne(StockOut::class);
    }
    public function stockMovements()
    {
        return $this->hasMany(stock_movements::class);
    }
}
