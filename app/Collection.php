<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','image1','image2','description'];
    public function categories(){
        return $this->hasMany(Category::class);
    }
}
