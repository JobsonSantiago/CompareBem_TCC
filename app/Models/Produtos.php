<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    
    class Produtos extends Model
    {
        use HasFactory;
    
        protected $table = 'produtos'; // Nome da tabela no banco de dados
    
        protected $fillable = [
            'nome_produto',
            'marca'
        ];
    
        // Relacionamento com ProdutosCaracteristicas
        public function caracteristicas()
        {
            return $this->hasMany(ProdutosCaracteristicas::class, 'id_produto', 'id_produto');
        }
    }
    
?>