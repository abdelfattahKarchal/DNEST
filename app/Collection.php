<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Collection extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','image1','image2','description'];

    public function categories(){
        return $this->hasMany(Category::class);
    }

    public function url_1(){
        return Storage::url($this->image1);
    }
    public function url_2(){
        return Storage::url($this->image2);
    }
}
