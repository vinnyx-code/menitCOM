<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'gambar',
        'kategori_id',
        'user_id',
        'views',
    ];

    public function incrementViews()
    {
        $this->increment('views');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function comments()
    {
    return $this->hasMany(Comment::class, 'beritas_id', 'id');
    }
}
