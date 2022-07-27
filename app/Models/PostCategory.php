<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'title',
        'active'
    ];
    public $timestamps = false;
    public function scopeIsActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeOfSort($query, $sort)
    {
        foreach ($sort as $column => $direction) {
            $query->orderBy($column, $direction);
        }

        return $query;
    }

    public static function getBySlug($slug)
    {
        return PostCategory::where('slug', $slug)->first();
    }

    public function listPosts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public static function getSub($catId)
    {
        return PostCategory::where('parent_id', $catId)->orderBy('title')->get();
    }
}
