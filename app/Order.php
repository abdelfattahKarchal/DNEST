<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = ['total_price','shipping_address','user_id','status_id'];

    /* public function status()
    {
        return $this->hasOne(Status::class);
    } */

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('price','quantity','material','size')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
