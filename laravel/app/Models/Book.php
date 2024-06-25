<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'autor',
        'titulo',
        'subtitulo',
        'edicao',
        'editora',
        'ano_publicacao',
        'capa',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
