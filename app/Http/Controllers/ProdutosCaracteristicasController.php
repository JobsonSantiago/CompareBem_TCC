<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdutosCaracteristicas;

class ProdutosCaracteristicasController extends Controller
{
    public function cadastro_preco(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:produtos,id_produto',
            'market_id' => 'required|exists:mercados,id_mercado',
            'preco' => 'required|numeric',
        ]);

        // Verifica se o preço já foi registrado para esse produto no mercado
        $precoExistente = ProdutosCaracteristicas::where('user_id', auth()->id())
            ->where('id_produto', $validatedData['product_id'])
            ->where('id_mercado', $validatedData['market_id'])
            ->first();

        if ($precoExistente) {
            // Se o preço já existir, retorna a mensagem de erro
            return redirect()->back()->with('error', 'Você ja registrou o preço para este produto neste mercado.');
        }

        // Criando o preço no banco de dados
        ProdutosCaracteristicas::create([
            'id_produto' => $validatedData['product_id'], // Usando o id_produto
            'id_mercado' => $validatedData['market_id'],  // Usando o id_mercado
            'preco' => $validatedData['preco'],
            'user_id' => auth()->id(),
        ]);

        // Retorna com sucesso se o preço for registrado
        return redirect()->back()->with('success', 'Preço registrado com sucesso!');
    }
}
