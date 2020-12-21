<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use SoftDeletes;
    protected $fillable = ['path_small','path_large','product_id'];

    public function product()
    {
        return $this->belongsTo(Image::class);
    }

    public function urlSmall(){
        return Storage::url($this->path_small);
    }
    public function urlLarge(){
        return Storage::url($this->path_large);
    }
}
