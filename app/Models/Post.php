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

        $query->when($filters['search'] ?? false, fn($query, $search) =>
        $query
            ->where('title', 'like', '%' . $search . '%')
            ->orWhere('content', 'like', '%' . $search . '%'));

        $query
            ->when($filters['category'] ?? false, fn($query, $category) =>
        $query
            ->whereHas('category', fn ($query) =>
        $query
            ->where('id', $category)));

        $query
            ->when($filters['author'] ?? false, fn($query, $author) =>
            $query
                ->whereHas('author', fn ($query) =>
                $query
                    ->where('name', 'like' , '%' . $author . "%")));


        $query->when( isset($filters['from']) && isset($filters['to']), fn($query) =>
        $query
            ->whereBetween('created_at',[$filters['from'],$filters['to']]));

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
