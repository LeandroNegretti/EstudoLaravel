<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
                                                                             //  Definindo nome para as rotas
Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index')->middleware('log.acesso');

Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [\App\Http\Controllers\ContatosController::class, 'contato'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatosController::class, 'salvar'])->name('site.contato');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');
Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');

// Agrupar rotas
// app será o prefixo da rota -> http://127.0.0.1:8000/app/login

Route::middleware('autenticacao:padrao, visitante')
->prefix('/app')->group(function() {
    //encadeando middleware
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [\App\Http\Controllers\LoginController::class, 'sair'])->name('app.sair');
    Route::get('/cliente',[\App\Http\Controllers\ClienteController::class, 'index'])->name('app.cliente');
    Route::get('/fornecedore', [\App\Http\Controllers\FornecedorController::class, 'index' ])->name('app.fornecedore');
    Route::get('/produto', [\App\Http\Controllers\ProdutoController::class, 'index'])->name('app.produto');
});

Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('teste');



// Rota de contingência (fallBack)
Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="'.route("site.index").'"> Clique aqui</a>';
});
