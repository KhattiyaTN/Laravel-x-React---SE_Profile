<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soft_skill extends Model
{
    protected $table = 'soft_skills';
    protected $primaryKey = 'skill_id';
    protected $fillable = [
        'skill_id', 
        'skill_name', 
        'skill_img_url',
        'skill_type', 
        'skill_date',
        'skill_description',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, foreignKey: 'user_id', ownerKey: 'user_id');
    }
}
