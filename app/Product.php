<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable =['name','sub_category_id','price','new_price','quantity','path_small_1','path_small_2','description'];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withTimestamps();
    }
    //scope local last product
    public function scopeLastProducts(Builder $query)
    {
        return $query->where('active','=',1)->orderBy(static::CREATED_AT,'desc');
    }

    public function url_1(){
        return Storage::url($this->path_small_1);
    }
    public function url_2(){
        return Storage::url($this->path_small_2);
    }
}
