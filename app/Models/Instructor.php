<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'major_id',
        'name',
        'phone',
        'user_id'
    ];


    // memanggil model majors
    public function major()
    {
        return $this->belongsTo(Majors::class, 'major_id', 'id');
    }
    public function user()
    {
        // manggil user model
        return $this->belongsTo(User::class);
    }
}
