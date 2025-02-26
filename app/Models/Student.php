<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    public $incrementing = false;

    protected $fillable = 
    [
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

    public function account()
    {
        return $this->hasOne(Account::class, foreignKey: 'user_id',  localKey: 'user_id');
    }

    public function badges()
    {
        return $this->hasMany(Badge::class, foreignKey: 'user_id', localKey: 'user_id');
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class, foreignKey: 'user_id', localKey: 'user_id');
    }

    public function class_projects()
    {
        return $this->hasMany(Class_project::class, foreignKey: 'user_id', localKey: 'user_id');
    }

    public function soft_skills()
    {
        return $this->hasMany(Soft_skill::class, foreignKey: 'user_id', localKey: 'user_id');
    }

}
