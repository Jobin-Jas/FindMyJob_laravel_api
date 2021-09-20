<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'first_name', 'last_name','headline','country','location', 'profile_picture','cover_picture'
    ];

    public function getProfilePictureAttribute($value){
        return $value ? asset($value) : null;
    }

    public function getCoverPictureAttribute($value){
        return $value ? asset($value) : null;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
