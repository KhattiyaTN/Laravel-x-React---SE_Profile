<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Class_project extends Model
{
    protected $table = 'class_projects';
    protected $primaryKey = 'class_project_id';
    protected $fillable = [
        'pro_id', 
        'pro_name',
        'pro_img_url',
        'pro_description',
        'pro_type',
        'pro_stack',
        'pro_git_url',
        'sub_id',
        'user_id'
    ];
    public $timestamps = false;

    public function student()
    {
        return $this->belongsTo(Student::class, foreignKey: 'user_id', ownerKey: 'user_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, foreignKey: 'sub_id', ownerKey: 'sub_id');
    }
    
}
