<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvaliacaoProduto;
use App\Models\ProdutosCaracteristicas;

class AvaliacaoProdutoController extends Controller
{
    public function avaliacao_produto(Request $request)
    {
        $validatedData = $request->validate([
            'avaliacao_preco' => 'required|string|in:Correto,Incorreto',
            'id_produto' => 'required|exists:produtos,id_produto',
            'id_mercado' => 'required|exists:mercados,id_mercado',
        ]);

        $avaliacaoExistente = AvaliacaoProduto::where('user_id', auth()->id())
            ->where('id_produto', $request->id_produto)
            ->where('id_mercado', $request->id_mercado)
            ->first();

        if ($avaliacaoExistente) {
            return redirect()->back()->with('error', 'Você já avaliou este produto neste mercado.');
        }


        // Criando a avaliação no banco
        AvaliacaoProduto::create([
            'id_produto' => $request->id_produto,
            'id_mercado' => $request->id_mercado,
            'avaliacao_preco' => $request->avaliacao_preco,
            'user_id' => auth()->id(),
        ]);

        if ($request->avaliacao_preco === 'Incorreto') {
            // Conte o número de avaliações "Incorretas" para esse produto e mercado
            $contagemIncorretas = AvaliacaoProduto::where('id_produto', $request->id_produto)
                ->where('id_mercado', $request->id_mercado)
                ->where('avaliacao_preco', 'Incorreto')
                ->count();

            // Se houver 3 avaliações "Incorretas", exclua os preços e as avaliações
            if ($contagemIncorretas >= 3) {
                // Exclua os preços da tabela produtos_caracteristicas
                ProdutosCaracteristicas::where('id_produto', $request->id_produto)
                    ->where('id_mercado', $request->id_mercado)
                    ->delete();

                // Exclua as avaliações da tabela avaliacao_preco
                AvaliacaoProduto::where('id_produto', $request->id_produto)
                    ->where('id_mercado', $request->id_mercado)
                    ->delete();

                return redirect()->back()->with('error', 'Este produto atingiu o limite de avaliações incorretas e será deletado.');
            }
        }


        return redirect()->back()->with('success', 'Avaliação registrada com sucesso!');
    }
}
