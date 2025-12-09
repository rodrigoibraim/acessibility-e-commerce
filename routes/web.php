<?php

use Illuminate\Support\Facades\Route;

// Rotas Públicas
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rotas de Autenticação
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Rotas de Catálogo Genéricas
Route::prefix('catalogo')->group(function () {
    // Rota genérica para categorias
    Route::get(
        '/{categoria}/{subcategoria?}/{subsubcategoria?}',
        [App\Http\Controllers\CatalogoController::class, 'index']
    )
        ->name('catalogo.categoria');
});

// Rota para detalhes do produto
Route::get('/produto/{id}', [App\Http\Controllers\ProdutoController::class, 'show'])
    ->name('produto.detalhe');

// Rotas Especiais
Route::get('/promocoes', [App\Http\Controllers\CatalogoController::class, 'promocoes'])->name('promocoes');
Route::get('/novidades', [App\Http\Controllers\CatalogoController::class, 'novidades'])->name('novidades');
Route::get('/mais-vendidos', [App\Http\Controllers\CatalogoController::class, 'maisVendidos'])->name('mais-vendidos');

// Rotas do Carrinho
Route::prefix('carrinho')->group(function () {
    Route::get('/', [App\Http\Controllers\CarrinhoController::class, 'index'])->name('carrinho.index');
    Route::post('/adicionar', [App\Http\Controllers\CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');
    Route::post('/remover/{id}', [App\Http\Controllers\CarrinhoController::class, 'remover'])->name('carrinho.remover');
    Route::post('/atualizar/{id}', [App\Http\Controllers\CarrinhoController::class, 'atualizar'])->name('carrinho.atualizar');
});

// Rotas da Minha Conta
Route::prefix('minha-conta')->middleware('auth')->group(function () {
    Route::get('/pedidos', [App\Http\Controllers\MinhaContaController::class, 'pedidos'])->name('minha-conta.pedidos');
    Route::get('/favoritos', [App\Http\Controllers\MinhaContaController::class, 'favoritos'])->name('minha-conta.favoritos');
    Route::get('/dados', [App\Http\Controllers\MinhaContaController::class, 'dados'])->name('minha-conta.dados');
    Route::post('/dados', [App\Http\Controllers\MinhaContaController::class, 'atualizarDados']);
    Route::get('/enderecos', [App\Http\Controllers\MinhaContaController::class, 'enderecos'])->name('minha-conta.enderecos');
});

// Rotas de Suporte
Route::get('/ajuda', [App\Http\Controllers\SuporteController::class, 'index'])->name('ajuda');
Route::get('/trocas-devolucoes', [App\Http\Controllers\SuporteController::class, 'trocasDevolucoes'])->name('trocas-devolucoes');
Route::get('/contato', [App\Http\Controllers\SuporteController::class, 'contato'])->name('contato');
Route::post('/contato', [App\Http\Controllers\SuporteController::class, 'enviarContato']);
Route::get('/sobre', [App\Http\Controllers\SuporteController::class, 'sobre'])->name('sobre');

// Rotas Admin (protegidas)
Route::prefix('admin')->middleware(['auth', 'can:admin-access'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/pedidos', [App\Http\Controllers\Admin\PedidoController::class, 'index'])->name('admin.pedidos');
    Route::get('/produtos', [App\Http\Controllers\Admin\ProdutoController::class, 'index'])->name('admin.produtos');
    Route::get('/estoque', [App\Http\Controllers\Admin\EstoqueController::class, 'index'])->name('admin.estoque');
    Route::get('/clientes', [App\Http\Controllers\Admin\ClienteController::class, 'index'])->name('admin.clientes');
    Route::get('/relatorios', [App\Http\Controllers\Admin\RelatorioController::class, 'index'])->name('admin.relatorios');
});

// Para testes - rota temporária para produto detalhe
Route::get('/produto/{id}', function ($id) {
    // Dados de exemplo para teste
    $produto = [
        'id' => $id,
        'nome' => 'Camiseta Básica Masculina',
        'descricao' => 'Camiseta de algodão 100%, corte tradicional, ideal para o dia a dia.',
        'preco' => 49.90,
        'preco_original' => 69.90,
        'desconto' => 29,
        'imagem' => 'https://placehold.co/500x500',
        'imagens' => [
            'https://placehold.co/500x500',
            'https://placehold.co/500x500?text=Imagem+2',
            'https://placehold.co/500x500?text=Imagem+3',
        ],
        'avaliacao' => 4.5,
        'avaliacoes_count' => 128,
        'estoque' => true,
        'tamanhos' => ['P', 'M', 'G', 'GG'],
        'cores' => ['Branco', 'Preto', 'Cinza', 'Azul'],
        'categoria' => 'masculino',
        'subcategoria' => 'camisetas',
        'subsubcategoria' => 'basicas',
        'especificacoes' => [
            ['nome' => 'Material', 'valor' => '100% Algodão'],
            ['nome' => 'Tipo de Manga', 'valor' => 'Curta'],
            ['nome' => 'Gola', 'valor' => 'Redonda'],
            ['nome' => 'Tipo de Estampa', 'valor' => 'Lisa'],
        ],
    ];

    $titulos = [
        'produto' => $produto['nome'],
        'categoria' => 'Moda Masculina',
        'subcategoria' => 'Camisetas',
        'subsubcategoria' => 'Básicas',
    ];

    $breadcrumb = [
        ['text' => 'Home', 'url' => route('home')],
        ['text' => 'Catálogo', 'url' => '#'],
        ['text' => 'Moda Masculina', 'url' => route('catalogo.categoria', ['categoria' => 'masculino'])],
        ['text' => 'Camisetas', 'url' => route('catalogo.categoria', ['categoria' => 'masculino', 'subcategoria' => 'camisetas'])],
        ['text' => 'Básicas', 'url' => route('catalogo.categoria', ['categoria' => 'masculino', 'subcategoria' => 'camisetas', 'subsubcategoria' => 'basicas'])],
        ['text' => $produto['nome'], 'url' => '#'],
    ];

    return view('produto.show', compact('produto', 'titulos', 'breadcrumb'));
})->name('produto.detalhe');
