<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //articles_
    protected $table = 'articles_';

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'article_category_', 'article_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeGetByDate($query, $year = null, $month = null)
    {
        if ($year) {
            $query = $query->whereYear('created_at', $year);
        }

        if ($month) {
            $query = $query->whereMonth('created_at', $month);
        }

        return $query;
    }
}
