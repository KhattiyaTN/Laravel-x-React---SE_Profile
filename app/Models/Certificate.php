<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table = 'certificates';
    protected $primaryKey = 'cerf_id';
    protected $fillable = [
        'cerf_name', 
        'cerf_img_url', 
        'cerf_type',
        'issued_by',
        'issue_date',
        'cerf_description',
        'user_id'
    ];
    public $timestamps = false;

    public function student()
    {
        return $this->belongsTo(Student::class, foreignKey: 'user_id', ownerKey: 'user_id');
    }
}
