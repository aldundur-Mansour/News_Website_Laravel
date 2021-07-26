<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = (['category','author' ,'comments']) ;
    protected $guarded= [];

    public function scopeFilter($query ,array $filters){
        if(isset($filters['search'])) {
            $query
                ->where('title','like', '%' . request('search') . '%' )
                ->orWhere('content','like', '%' . request('search') . '%');
        }
    }


    // Relationships
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
