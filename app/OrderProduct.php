<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public $product;
    public $quantity;
    public $price;
    public $material;
}
