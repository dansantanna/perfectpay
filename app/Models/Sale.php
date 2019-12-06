<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['quantity', 'sale_amount', 'discount', 'status', 'product_id'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
