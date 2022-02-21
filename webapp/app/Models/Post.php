<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'id',
        'UserID', 
        'Username',
        'body',
        'image'
    ];
        
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function user()
    {
        // return $this->belongsTo('App\User', 'likes');
        return $this->belongsTo('App\Models\User', 'likes');
    }
    public function down()
    {
        Schema::table('posts', function(Blueprint $table){
            $table->dropColumn('file');
        }); 
    }
}
