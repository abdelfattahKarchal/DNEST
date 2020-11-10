<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable =['id','size','add_price','product_id','description','created_at','updated_at','deleted_at'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
