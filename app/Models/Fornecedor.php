<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores';

    protected $fillable = [
        'razao_social',
        'cnpj',
        'vendedor',
        'telefone',
        'produto_id',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}