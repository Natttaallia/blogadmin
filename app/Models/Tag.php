<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = '_tags_';

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
