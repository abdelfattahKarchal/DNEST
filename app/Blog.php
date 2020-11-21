<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
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
    //scope local last blogs
    public function scopeLastBlogs(Builder $query)
    {
        return $query->orderBy(static::CREATED_AT,'desc');
    }
}
