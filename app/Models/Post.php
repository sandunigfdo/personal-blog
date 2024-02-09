<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'excerpt', 
        'body',
        'category_id',
        'user_id',
        
    ];

    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function comments():HasMany {
        return $this->hasMany(Comment::class);
    }

    public function category():BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, array $filters): void {

        if($filters['search'] ?? false){
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }
    }
}
