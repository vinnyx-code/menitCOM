<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaView extends Model
{
    use HasFactory;

    protected $table = 'berita_views';

    protected $fillable = ['berita_id','user_id','session_id','ip','user_agent'];

    public function berita()
    {
        return $this->belongsTo(Berita::class, 'berita_id');
    }
}
