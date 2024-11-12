<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvaliacaoProduto extends Model
{
    use HasFactory;

    protected $table = 'avaliacao_preco';

    protected $fillable = [
        'avaliacao_preco',
        'id_produto',
        'id_mercado',
        'user_id'
    ];
}
?>
