<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['label'];

    /* public function orders()
    {
        return $this->belongsTo(Order::class);
    } */

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
