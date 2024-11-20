<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Favorito;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    public function boot(Request $request)
    {
        // Compartilhar a variável favoritoExistente para todas as views
        View::share('favoritoExistente', $this->verificarFavoritoExistente($request));
    }

    protected function verificarFavoritoExistente(Request $request)
    {

        return Favorito::where('user_id', auth()->id())
            ->where('id_produto', $request->id_produto) // Atribua um valor default se não houver
            ->where('id_mercado', $request->id_mercado) // Atribua um valor default se não houver
            ->exists();
    }
}
