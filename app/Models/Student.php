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

    public function badges()
    {
        return $this->hasMany(Badge::class, foreignKey: 'user_id', localKey: 'user_id');
    }

    public function Certificates()
    {
        return $this->hasMany(Certificate::class, foreignKey: 'user_id', localKey: 'user_id');
    }

    public function Class_project()
    {
        return $this->hasMany(Class_project::class, foreignKey: 'user_id', localKey: 'user_id');
    }

    public function Soft_skill()
    {
        return $this->hasMany(Soft_skill::class, foreignKey: 'user_id', localKey: 'user_id');
    }

}
