<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['name', 'comment', 'beritas_id', 'profile_photo', 'user_id'];
    public $timestamps = true;

    // Accessor to keep view using 'isi' property
    public function getIsiAttribute()
    {
        return $this->comment;
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
