<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    protected $primaryKey = 'sub_id';

    protected $fillable = [
        'sub_id',
        'sub_name',
        'sub_description',
        'sub_credit',
        'sub_lecture',
        'sub_lab',
        'sub_homework',
    ];

    public function Class_project()
    {
        return $this->hasMany(Class_project::class, foreignKey: 'sub_id', localKey: 'sub_id');
    }
}
