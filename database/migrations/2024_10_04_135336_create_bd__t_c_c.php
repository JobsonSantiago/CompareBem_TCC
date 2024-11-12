<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{

    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id('id_produto');
            $table->string('nome_produto', 100);
            $table->string('marca', 100);
            $table->timestamps();
        });

        DB::table('produtos')->insert([
            ['id_produto' => 1, 'nome_produto' => 'Arroz', 'marca' => 'Camil'],
            ['id_produto' => 2, 'nome_produto' => 'Arroz', 'marca' => 'Tio João'],
            ['id_produto' => 3, 'nome_produto' => 'Feijão', 'marca' => 'Camil'],
            ['id_produto' => 4, 'nome_produto' => 'Feijão', 'marca' => 'Kicaldo'],
            ['id_produto' => 5, 'nome_produto' => 'Açúcar', 'marca' => 'União'],
            ['id_produto' => 6, 'nome_produto' => 'Açúcar', 'marca' => 'Caravelas'],
            ['id_produto' => 7, 'nome_produto' => 'Sal', 'marca' => 'Cisne'],
            ['id_produto' => 8, 'nome_produto' => 'Sal', 'marca' => 'Lebre'],
            ['id_produto' => 9, 'nome_produto' => 'Café', 'marca' => 'Pilão'],
            ['id_produto' => 10, 'nome_produto' => 'Café', 'marca' => 'União'],
            ['id_produto' => 11, 'nome_produto' => 'Macarrão', 'marca' => 'Galo'],
            ['id_produto' => 12, 'nome_produto' => 'Macarrão', 'marca' => 'Adria'],
            ['id_produto' => 13, 'nome_produto' => 'Farinha de trigo', 'marca' => 'Dona Benta'],
            ['id_produto' => 14, 'nome_produto' => 'Farinha de trigo', 'marca' => 'Qualitá'],
            ['id_produto' => 15, 'nome_produto' => 'Farinha temperada', 'marca' => 'Yoki'],
            ['id_produto' => 16, 'nome_produto' => 'Farinha temperada', 'marca' => 'Kodilar'],
            ['id_produto' => 17, 'nome_produto' => 'Achocolatado em pó', 'marca' => 'Italac'],
            ['id_produto' => 18, 'nome_produto' => 'Achocolatado em pó', 'marca' => 'Toddy'],
            ['id_produto' => 19, 'nome_produto' => 'Óleo', 'marca' => 'Soya'],
            ['id_produto' => 20, 'nome_produto' => 'Óleo', 'marca' => 'Liza'],
            ['id_produto' => 21, 'nome_produto' => 'Creme de leite', 'marca' => 'Italac'],
            ['id_produto' => 22, 'nome_produto' => 'Creme de leite', 'marca' => 'Nestlé'],
            ['id_produto' => 23, 'nome_produto' => 'Molho de tomate', 'marca' => 'Quero'],
            ['id_produto' => 24, 'nome_produto' => 'Molho de tomate', 'marca' => 'Fugini'],
            ['id_produto' => 25, 'nome_produto' => 'Bolacha (Cream Cracker)', 'marca' => 'Adria'],
            ['id_produto' => 26, 'nome_produto' => 'Bolacha (Cream Cracker)', 'marca' => 'Bauduco'],
            ['id_produto' => 27, 'nome_produto' => 'Leite condensado', 'marca' => 'Piracanjuba'],
            ['id_produto' => 28, 'nome_produto' => 'Leite condensado', 'marca' => 'Italac'],
            ['id_produto' => 29, 'nome_produto' => 'Sabonete', 'marca' => 'Dove'],
            ['id_produto' => 30, 'nome_produto' => 'Sabonete', 'marca' => 'Lux'],
            ['id_produto' => 31, 'nome_produto' => 'Pasta de dente', 'marca' => 'Colgate'],
            ['id_produto' => 32, 'nome_produto' => 'Pasta de dente', 'marca' => 'Sorriso'],
            ['id_produto' => 33, 'nome_produto' => 'Papel higiênico', 'marca' => 'Sublime'],
            ['id_produto' => 34, 'nome_produto' => 'Papel higiênico', 'marca' => 'Personal'],
            ['id_produto' => 35, 'nome_produto' => 'Leite', 'marca' => 'Italac'],
            ['id_produto' => 36, 'nome_produto' => 'Leite', 'marca' => 'Piracanjuba'],
            ['id_produto' => 37, 'nome_produto' => 'Refresco em pó', 'marca' => 'Tang'],
            ['id_produto' => 38, 'nome_produto' => 'Refresco em pó', 'marca' => 'Mid'],
            ['id_produto' => 39, 'nome_produto' => 'Detergente', 'marca' => 'Limpol'],
            ['id_produto' => 40, 'nome_produto' => 'Detergente', 'marca' => 'Ypê'],
            ['id_produto' => 41, 'nome_produto' => 'Sabão em pó', 'marca' => 'Ypê'],
            ['id_produto' => 42, 'nome_produto' => 'Sabão em pó', 'marca' => 'Omo'],
            ['id_produto' => 43, 'nome_produto' => 'Esponja de aço', 'marca' => 'Bombril'],
            ['id_produto' => 44, 'nome_produto' => 'Esponja de aço', 'marca' => 'Assolan'],
        ]);

        Schema::create('mercados', function (Blueprint $table) {
            $table->id('id_mercado');
            $table->string('nome_mercado', 100);
            $table->timestamps();
        });
        
        DB::table('mercados')->insert([
            ['id_mercado'=> 1, 'nome_mercado' => 'Mercado Noemia'],
            ['id_mercado'=> 2, 'nome_mercado' => 'Mercado Tietê'],
            ['id_mercado'=> 3, 'nome_mercado' => 'Mercado Economix'],
            ['id_mercado'=> 4, 'nome_mercado' => 'Mercado Atacadinho']
            ]
        );

        Schema::create('produtos_caracteristicas', function (Blueprint $table) {
            $table->id('id_preco');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('id_produto')->constrained('produtos', 'id_produto');
            $table->foreignId('id_mercado')->constrained('mercados', 'id_mercado');
            $table->decimal('preco', 10, 2);
            $table->timestamps();
        });

        Schema::create('avaliacao_mercado', function (Blueprint $table) {
            $table->id('id_avaliacao_mercado');
            $table->foreignId('id_mercado')->constrained('mercados', 'id_mercado');
            $table->integer('avaliacao_mercado')->check('avaliacao BETWEEN 1 AND 5');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('avaliacao_preco', function (Blueprint $table) {
            $table->id('id_avaliacao_preco');
            $table->enum('avaliacao_preco', ['Correto', 'Incorreto']);
            $table->foreignId('id_produto')->constrained('produtos', 'id_produto');
            $table->foreignId('id_mercado')->constrained('mercados', 'id_mercado');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('favoritos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('id_produto')->constrained('produtos', 'id_produto')->onDelete('cascade');
            $table->foreignId('id_mercado')->constrained('mercados', 'id_mercado')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('avaliacao_preco');
        Schema::dropIfExists('avaliacao_mercado');
        Schema::dropIfExists('produtos_caracteristicas');
        Schema::dropIfExists('mercados');
        Schema::dropIfExists('produtos');
        Schema::dropIfExists('favoritos');
    }
};
