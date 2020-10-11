<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = ['name','image1','image2','description'];
    public function categories(){
        return $this->hasMany(Category::class);
    }
}
