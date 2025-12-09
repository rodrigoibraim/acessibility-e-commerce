<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CatalogoController;

class ProdutoController extends Controller
{
    /**
     * Exibir detalhes do produto
     */
    public function show($id)
    {
        // Buscar produto do banco de dados (simulação)
        $produto = $this->buscarProdutoPorId($id);

        if (!$produto) {
            abort(404, 'Produto não encontrado');
        }

        // Mapear títulos
        $titulos = $this->mapearTitulosProduto($produto);

        // Construir breadcrumb
        $breadcrumb = $this->construirBreadcrumbProduto($produto);

        // Produtos relacionados (simulação)
        $produtosRelacionados = $this->buscarProdutosRelacionados($produto);

        return view('produto.show', compact('produto', 'titulos', 'breadcrumb', 'produtosRelacionados'));
    }

    /**
     * Buscar produto por ID (simulação)
     */
    private function buscarProdutoPorId($id)
    {
        // Simulação - você implementará com seu modelo Product
        $produtos = [
            1 => [
                'id' => 1,
                'nome' => 'Camiseta Básica Masculina Branca',
                'descricao' => 'Camiseta de algodão 100% penteado, corte tradicional, ideal para o dia a dia. Confortável e versátil, perfeita para combinar com qualquer look.',
                'descricao_longa' => '<p>Camiseta fabricada com algodão 100% penteado de alta qualidade, proporcionando maciez e durabilidade. Corte tradicional que oferece conforto sem ser muito justa ou larga.</p>
                                    <p><strong>Características:</strong></p>
                                    <ul>
                                        <li>100% algodão penteado</li>
                                        <li>Gola redonda reforçada</li>
                                        <li>Costuras duplas nas laterais</li>
                                        <li>Mangas curtas</li>
                                        <li>Não encolhe após lavagens</li>
                                    </ul>',
                'preco' => 49.90,
                'preco_original' => 69.90,
                'desconto' => 29,
                'imagem' => 'https://placehold.co/500x500?text=Hello+World',
                'imagens' => [
                    'https://placehold.co/500x500',
                    'https://placehold.co/500x500?text=Imagem+2',
                    'https://placehold.co/500x500?text=Imagem+3',
                    'https://placehold.co/500x500?text=Imagem+4',
                ],
                'avaliacao' => 4.5,
                'avaliacoes_count' => 128,
                'estoque' => 50,
                'tamanhos' => ['P', 'M', 'G', 'GG'],
                'cores' => [
                    ['nome' => 'Branco', 'codigo' => '#FFFFFF'],
                    ['nome' => 'Preto', 'codigo' => '#000000'],
                    ['nome' => 'Cinza', 'codigo' => '#808080'],
                    ['nome' => 'Azul Marinho', 'codigo' => '#000080'],
                ],
                'categoria' => 'masculino',
                'subcategoria' => 'camisetas',
                'subsubcategoria' => 'basicas',
                'marca' => 'BasicWear',
                'sku' => 'CAM-BAS-MAS-001',
                'especificacoes' => [
                    ['nome' => 'Material', 'valor' => '100% Algodão Penteado'],
                    ['nome' => 'Tipo de Manga', 'valor' => 'Curta'],
                    ['nome' => 'Gola', 'valor' => 'Redonda'],
                    ['nome' => 'Tipo de Estampa', 'valor' => 'Lisa'],
                    ['nome' => 'Origem', 'valor' => 'Nacional'],
                    ['nome' => 'Composição', 'valor' => '100% Algodão'],
                    ['nome' => 'Lavagem', 'valor' => 'Lavar à mão ou máquina'],
                ],
                'avaliacoes' => [
                    [
                        'nome' => 'João Silva',
                        'data' => '15/08/2023',
                        'avaliacao' => 5,
                        'comentario' => 'Excelente qualidade! Melhor camiseta que já comprei.',
                        'recomenda' => true,
                    ],
                    [
                        'nome' => 'Maria Santos',
                        'data' => '10/08/2023',
                        'avaliacao' => 4,
                        'comentario' => 'Boa camiseta, mas encolheu um pouco após lavar.',
                        'recomenda' => true,
                    ],
                ],
            ],
            2 => [
                'id' => 2,
                'nome' => 'Calça Jeans Masculina Slim',
                // ... outros dados
            ],
            // Adicione mais produtos conforme necessário
        ];

        return $produtos[$id] ?? null;
    }

    /**
     * Mapear títulos do produto
     */
    private function mapearTitulosProduto($produto)
    {
        $catalogoController = new CatalogoController();
        $titulosCategoria = $catalogoController->mapearTitulos(
            $produto['categoria'] ?? null,
            $produto['subcategoria'] ?? null,
            $produto['subsubcategoria'] ?? null
        );

        return [
            'produto' => $produto['nome'],
            'categoria' => $titulosCategoria['categoria'] ?? null,
            'subcategoria' => $titulosCategoria['subcategoria'] ?? null,
            'subsubcategoria' => $titulosCategoria['subsubcategoria'] ?? null,
        ];
    }

    /**
     * Construir breadcrumb para produto
     */
    private function construirBreadcrumbProduto($produto)
    {
        $breadcrumb = [
            ['text' => 'Home', 'url' => route('home')],
            ['text' => 'Catálogo', 'url' => '#'],
        ];

        $titulos = $this->mapearTitulosProduto($produto);

        if ($produto['categoria']) {
            $breadcrumb[] = [
                'text' => $titulos['categoria'],
                'url' => route('catalogo.categoria', ['categoria' => $produto['categoria']])
            ];
        }

        if ($produto['subcategoria']) {
            $breadcrumb[] = [
                'text' => $titulos['subcategoria'],
                'url' => route('catalogo.categoria', [
                    'categoria' => $produto['categoria'],
                    'subcategoria' => $produto['subcategoria']
                ])
            ];
        }

        if ($produto['subsubcategoria']) {
            $breadcrumb[] = [
                'text' => $titulos['subsubcategoria'],
                'url' => route('catalogo.categoria', [
                    'categoria' => $produto['categoria'],
                    'subcategoria' => $produto['subcategoria'],
                    'subsubcategoria' => $produto['subsubcategoria']
                ])
            ];
        }

        $breadcrumb[] = [
            'text' => $produto['nome'],
            'url' => '#'
        ];

        return $breadcrumb;
    }

    /**
     * Buscar produtos relacionados
     */
    private function buscarProdutosRelacionados($produto)
    {
        // Simulação - buscar produtos da mesma categoria
        $catalogoController = new CatalogoController();
        $filtros = [
            'categoria' => $produto['categoria'],
            'subcategoria' => $produto['subcategoria'],
            'excluir_id' => $produto['id'],
        ];

        $produtos = $catalogoController->buscarProdutos($filtros);

        // Limitar a 4 produtos
        return array_slice($produtos, 0, 4);
    }
}
