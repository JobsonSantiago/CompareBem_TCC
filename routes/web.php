<?php

use App\Models\Favorito;
use App\Http\Controllers\PesquisaController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\AvaliacaoProdutoController;
use App\Http\Controllers\AvaliacaoMercadoController;
use App\Http\Controllers\ProdutosCaracteristicasController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use PhpOption\Option;

//* Página inicial

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home');

// Proteção de rotas para usuários autenticados (usando middleware auth)
Route::middleware('auth')->group(function () {
    // Exemplo de rota protegida
    Route::get('/cadastro_produto', function () {
        return view('cadastro_produto');
    })->name('cadastro_produto');

    //rota para registrar o preço dos produtos
    Route::post('/cadastro_preco',[ProdutosCaracteristicasController::class, 'cadastro_preco'])->name('cadastro_preco');

    //rota para registrar avaliação do preço dos produtos
    Route::post('/avaliacao_produto', [AvaliacaoProdutoController::class, 'avaliacao_produto'])->name('avaliacao_produto');

    //rota para registrar avaliação os mercados
    Route::post('/avaliacao_mercados', [AvaliacaoMercadoController::class, 'avaliacao_mercados'])->name('avaliacao_mercados');

    //adicionar favoritos
    Route::post('/favoritar/adicionar', [FavoritoController::class, 'adicionar'])->name('favoritar');

    //remover favoritos
    Route::post('/favoritar/remover', [FavoritoController::class, 'remover'])->name('favoritar_remover');

    Route::get('/meus_favoritos', [FavoritoController::class, 'listar'])->name('meus.favoritos');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//rota que chama o metodo pesquisa no PesquisaController para que a página seja redirecionada
Route::get('/search', [PesquisaController::class, 'pesquisa'])->name('search');

//rota para redirecionar para a localização do mercado
Route::get('/mercado1', function () {
    return redirect()->away('https://maps.app.goo.gl/ytZgiWfXFNCrCM14A');
});
Route::get('/mercado2', function () {
    return redirect()->away('https://maps.app.goo.gl/B4RcYk9qC67h7gr97');
});
Route::get('/mercado3', function () {
    return redirect()->away('https://maps.app.goo.gl/pzXmMQthMtuqHCHS8');
});
Route::get('/mercado4', function () {
    return redirect()->away('https://maps.app.goo.gl/wChhgj7tFUCMDZUT7');
});

//rotas de views
Route::get('/mercados', function () {
    return view('mercados');
})->name('mercados');

Route::get('/produtos', function () {
    return view('produtos');
})->name('produtos');


Route::get('/produtos_alimentos', function () {
    return view('produtos_alimentos');
})->name('produtos_alimentos');

Route::get('/produtos_higiene', function () {
    return view('produtos_higiene');
})->name('produtos_higiene');

Route::get('/produtos_bebidas', function () {
    return view('produtos_bebidas');
})->name('produtos_bebidas');

Route::get('/produtos_limpeza', function () {
    return view('produtos_limpeza');
})->name('produtos_limpeza');

Route::get('/arroz', function () {
    return view('arroz');
})->name('arroz');

Route::get('/feijao', function () {
    return view('feijao');
})->name('feijao');

Route::get('/arroz', function () {
    return view('arroz');
})->name('arroz');

Route::get('/acucar', function () {
    return view('acucar');
})->name('acucar');

Route::get('/sal', function () {
    return view('sal');
})->name('sal');

Route::get('/cafe', function () {
    return view('cafe');
})->name('cafe');

Route::get('/macarrao', function () {
    return view('macarrao');
})->name('macarrao');

Route::get('/farinhadetrigo', function () {
    return view('farinhadetrigo');
})->name('farinhadetrigo');

Route::get('/farinhatemperada', function () {
    return view('farinhatemperada');
})->name('farinhatemperada');

Route::get('/achocolatado', function () {
    return view('achocolatado');
})->name('achocolatado');

Route::get('/oleo', function () {
    return view('oleo');
})->name('oleo');

Route::get('/cremedeleite', function () {
    return view('cremedeleite');
})->name('cremedeleite');

Route::get('/molhodetomate', function () {
    return view('molhodetomate');
})->name('molhodetomate');

Route::get('/bolacha', function () {
    return view('bolacha');
})->name('bolacha');

Route::get('/leitecondensado', function () {
    return view('leitecondensado');
})->name('leitecondensado');

Route::get('/sabonete', function () {
    return view('sabonete');
})->name('sabonete');

Route::get('/pasta', function () {
    return view('pasta');
})->name('pasta');

Route::get('/papel', function () {
    return view('papel');
})->name('papel');

Route::get('/leite', function () {
    return view('leite');
})->name('leite');

Route::get('/suco', function () {
    return view('suco');
})->name('suco');

Route::get('/detergente', function () {
    return view('detergente');
})->name('detergente');

Route::get('/sabao', function () {
    return view('sabao');
})->name('sabao');

Route::get('/bombril', function () {
    return view('bombril');
})->name('bombril');

Route::get('/logout', function () {
    return view('logout');
})->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Auth::routes(['reset' => true]);

// Rota para exibir o formulário de recuperação de senha
Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');

// Rota para processar a solicitação de envio do link de redefinição
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

require __DIR__ . '/auth.php';
