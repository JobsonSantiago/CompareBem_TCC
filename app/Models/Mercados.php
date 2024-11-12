<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    
    class Mercados extends Model
    {
        use HasFactory;
    
        protected $table = 'mercados'; // Nome da tabela no banco de dados
    
        protected $fillable = [
            'nome_mercado',
        ];
    
        // Relacionamento com ProdutosCaracteristicas
        public function caracteristicas()
        {
            return $this->hasMany(ProdutosCaracteristicas::class, 'id_mercado', 'id_mercado');
        }
    }
    
?>