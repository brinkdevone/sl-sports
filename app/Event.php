<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Event extends Model
{

    use Commentable;

    protected $fillable = [
        'title', 'content', 'due_date',
    ];
}
