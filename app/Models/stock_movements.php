<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stock_movements extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'type',
        'quantity',
        'reference_no',
        'notes'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
