<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $table = 'badges';
    protected $primaryKey = 'badge_id';
    protected $fillable = [
        'badge_id', 
        'badge_name', 
        'badge_type',
        'badge_img_url', 
        'badge_description',
        'badge_date_awarded',
        'user_id'
    ];
    public $timestamps = false;

    public function student()
    {
        return $this->belongsTo(Student::class, foreignKey: 'user_id', ownerKey: 'user_id');
    }
}
