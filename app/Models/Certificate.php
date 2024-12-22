<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table = 'certificates';
    protected $primaryKey = 'certificate_id';
    protected $fillable = [
        'certificate_id', 
        'certificate_name', 
        'certificate_type',
        'certificate_img_url', 
        'certificate_description',
        'certificate_date_awarded',
        'user_id'
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, foreignKey: 'user_id', ownerKey: 'user_id');
    }
}
