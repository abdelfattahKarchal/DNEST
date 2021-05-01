<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_product';
    
    public $product;
    public $quantity;
    public $price;
    public $material;
}
