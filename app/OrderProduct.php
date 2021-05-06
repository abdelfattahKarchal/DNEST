<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderProduct extends Model
{
    protected $table = 'order_product';
    
    public $product;
    public $quantity;
    public $price;
    public $material;

    public function best_product(){
        return $this->hasOne(Product::class);
    }
}
