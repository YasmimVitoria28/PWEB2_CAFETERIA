<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produto';

    protected $fillable = [
        'nome',
        'preco_unit',
        'categoria_id',
        'imagem',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}