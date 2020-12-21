<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','description', 'active', 'collection_id'];

    public function collection(){
        return $this->belongsTo(Collection::class);
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
