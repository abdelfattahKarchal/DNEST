<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Collection extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','image1','image2','description','active'];

    public function categories(){
        return $this->hasMany(Category::class);
    }

    public function url_1(){
        return Storage::url($this->image1);
    }
    public function url_2(){
        return  $this->image2 ? Storage::url($this->image2) : null;
    }

    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        static::deleting(function($collection) { // before delete() method call this
             //$collection->categories()->delete();
             foreach ($collection->categories as $category) {
                foreach ($category->subCategories as $subcategory) {
                    foreach ($subcategory->products as $product) {
                        foreach ($product->images as $image) {
                            $image->delete();
                        }
                        $product->delete();
                    }
                    $subcategory->delete();
                }
                $category->delete();
             }
        });
    }
}
