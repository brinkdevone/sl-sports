<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Article extends Model
{
    use Commentable;

    protected $fillable = [
        'title', 'content'
    ];

    public static function paginate(int $int)
    {
    }

    public static function find()
    {
    }
}
