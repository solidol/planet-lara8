<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo('App\Models\PostCategory', 'post_category_id');
    }

    public function setPTag()
    {
        preg_match('/<p>/si', $this->content, $matches);
        if (!isset($matches[0])) {
            $post_data = explode("\n", $this->content);
            $this->content = "<p>" . implode("</p><p>", array_values($post_data)) . "</p>";
        }
        preg_match('/<p>/si', $this->altpreview, $matches);
        if (!isset($matches[0])) {
            $post_data = explode("\n", $this->altpreview);
            $this->altpreview = "<p>" . implode("</p><p>", array_values($post_data)) . "</p>";
        }
        return $this;
    }
}
