<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'title',
        'firstname',
        'lastname',
        'nickname',
        'github',
        'generation',
        'image',
        'email',
        'tel',
        'facebook',
    ];
}
