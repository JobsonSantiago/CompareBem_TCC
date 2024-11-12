<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorito;
use App\Models\User;


class FavoritoController extends Controller
{
    public function adicionar(Request $request)
    {
        $request->validate([
            'id_produto' => 'required|exists:produtos,id_produto',
            'id_mercado' => 'required|exists:mercados,id_mercado',
        ]);

        // Verifica se o produto e o mercado já estão favoritados pelo usuário
        $favoritoExistente = Favorito::where('user_id', auth()->id())
            ->where('id_produto', $request->id_produto)
            ->where('id_mercado', $request->id_mercado)
            ->exists();

        if ($favoritoExistente) {
            return redirect()->back()->with('error', 'Você já favoritou este produto neste mercado.');
        }

        // Se não existir, cria um novo favorito
        Favorito::create([
            'user_id' => auth()->id(),
            'id_produto' => $request->id_produto,
            'id_mercado' => $request->id_mercado,
        ]);

        return redirect()->back()->with('success', 'Produto adicionado aos favoritos!');
    }

    public function listar()
    {
        $favoritos = Favorito::with(['produto', 'mercado'])
            ->where('user_id', auth()->id())
            ->get();

        return view('meus_favoritos', compact('favoritos'));
    }

    public function remover(Request $request)
    {
        $request->validate([
            'id_produto' => 'required|integer',
            'id_mercado' => 'required|integer',
        ]);

        // Encontra o favorito do usuário com base nos critérios fornecidos
        $favorito = Favorito::where('user_id', auth()->id())
            ->where('id_produto', $request->id_produto)
            ->where('id_mercado', $request->id_mercado)
            ->delete();

        return redirect()->back()->with('success', 'Favorito removido com sucesso!');
    }
}
