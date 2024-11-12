<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PesquisaController extends Controller
{
    public function pesquisa(Request $request)
    {

        $produtoPesquisado = $request->input('pesquisaProdutos');

        if ($produtoPesquisado == "Achocolatado") {
            return view('achocolatado');
        } else if ($produtoPesquisado == "Açúcar") {
            return view('acucar');
        } else if ($produtoPesquisado == "Arroz") {
            return view('arroz');
        } else if ($produtoPesquisado == "Bolacha") {
            return view('bolacha');
        } else if ($produtoPesquisado == "Bombril") {
            return view('bombril');
        } else if ($produtoPesquisado == "Café") {
            return view('cafe');
        } else if ($produtoPesquisado == "CremeDeLeite") {
            return view('cremedeleite');
        } else if ($produtoPesquisado == "Detergente") {
            return view('detergente');
        } else if ($produtoPesquisado == "FarinhaDeTrigo") {
            return view('farinhadetrigo');
        } else if ($produtoPesquisado == "FarinhaTemperada") {
            return view('farinhatemperada');
        } else if ($produtoPesquisado == "Feijão") {
            return view('feijao');
        } else if ($produtoPesquisado == "Leite") {
            return view('leite');
        } else if ($produtoPesquisado == "LeiteCondensado") {
            return view('leitecondensado');
        } else if ($produtoPesquisado == "Macarrão") {
            return view('macarrao');
        } else if ($produtoPesquisado == "MolhoDeTomate") {
            return view('molhodetomate');
        } else if ($produtoPesquisado == "Oleo") {
            return view('oleo');
        } else if ($produtoPesquisado == "Papel") {
            return view('papel');
        } else if ($produtoPesquisado == "Pasta") {
            return view('pasta');
        } else if ($produtoPesquisado == "Sabão") {
            return view('sabao');
        } else if ($produtoPesquisado == "Sabonete") {
            return view('sabonete');
        } else if ($produtoPesquisado == "Suco") {
            return view('suco');
        } else {
            return view('home');
        }
    }
}
