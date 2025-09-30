<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = ['user_id', 'total_amount', 'status', 'payment_method', 'payment_id'];

    public function items()
    {
        return $this->hasMany(order_item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
