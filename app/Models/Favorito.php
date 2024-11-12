<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    protected $table = 'favoritos'; // Nome da tabela no banco de dados

    protected $fillable = ['user_id', 'id_produto', 'id_mercado'];

    public function produto() 
    {
        return $this->belongsTo(Produtos::class, 'id_produto', 'id_produto'); 
    }

    public function mercado() 
    {
        return $this->belongsTo(Mercados::class, 'id_mercado', 'id_mercado'); 
    }

    public function caracteristicas() 
    {
        return $this->hasMany(ProdutosCaracteristicas::class, 'id_produto', 'id_produto'); 
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

