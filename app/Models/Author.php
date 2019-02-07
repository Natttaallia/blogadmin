<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = '_authors_';

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
