<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country'
    ];
    public function stockOut()
    {
        return $this->hasOne(StockOut::class);
    }
}
