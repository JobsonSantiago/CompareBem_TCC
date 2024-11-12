<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvaliacaoMercados extends Model
{
    use HasFactory;

    protected $table = 'avaliacao_mercado';

    protected $fillable = [
        'id_mercado',
        'avaliacao_mercado',
        'user_id'
    ];
}
