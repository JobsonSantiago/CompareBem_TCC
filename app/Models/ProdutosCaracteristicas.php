<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    
    class ProdutosCaracteristicas extends Model
    {
        use HasFactory;
    
        protected $table = 'produtos_caracteristicas'; // Nome da tabela no banco de dados
    
        protected $fillable = [
            'id_produto',
            'id_mercado',
            'preco',
            'user_id'
        ];
    }    
?>