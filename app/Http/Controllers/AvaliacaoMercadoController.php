<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvaliacaoMercados;
use App\Models\ProdutosCaracteristicas;

class AvaliacaoMercadoController extends Controller
{
    public function avaliacao_mercados(Request $request)
    {
        $validatedData = $request->validate([
            'avaliacao_mercado' => 'required|integer|between:1,5',
            'id_mercado' => 'required|exists:mercados,id_mercado',
        ]);

        $avaliacaoExistente = AvaliacaoMercados::where('user_id', auth()->id())
            ->where('id_mercado', $request->id_mercado)
            ->first();

        if ($avaliacaoExistente) {
            return redirect()->back()->with('error', 'Você já avaliou este mercado.');
        }

        // Criando a avaliação no banco
        AvaliacaoMercados::create([
            'id_mercado' => $request->id_mercado,
            'avaliacao_mercado' => $request->avaliacao_mercado,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Avaliação registrada com sucesso!');
    }
}
