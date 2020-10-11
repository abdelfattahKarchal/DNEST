<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','description'];

    public function collection(){
        return $this->belongsTo(Collection::class);
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
