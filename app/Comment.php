<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{   
    public function commentable()
    {
        return $this->morphTo();
    }
    
    protected $fillable = [
        'body',
        'commentable_id',
        'commentable_type',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
