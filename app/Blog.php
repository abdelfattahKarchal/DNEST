<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title','description1','note','media_id','path','description2'];
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
