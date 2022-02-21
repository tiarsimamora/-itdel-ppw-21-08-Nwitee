<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Comment\Events\CommentCreated;
use Illuminate\Comment\Events\CommentUpdated;
use Illuminate\Comment\Events\CommentDeleted;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;

class Comment extends Model
{
    protected $guarded = [];
    
    public function child()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
