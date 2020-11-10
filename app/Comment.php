<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =['description','user_name','user_email'];
    
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
