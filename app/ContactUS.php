<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUS extends Model
{
    public $table = 'contactus';

    public $fillable = [
        'firstname', 'lastname', 'email', 'subject', 'message'
    ];
}
