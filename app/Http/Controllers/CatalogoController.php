<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    /**
     * Página genérica do catálogo
     */
    public function index($categoria, $subcategoria = null, $subsubcategoria = null)
    {
        // Mapeamento de títulos amigáveis
        $titulos = $this->mapearTitulos($categoria, $subcategoria, $subsubcategoria);

        // Construir breadcrumb para AdminLTE
        $breadcrumb = $this->construirBreadcrumb($categoria, $subcategoria, $subsubcategoria);

        // Filtros ativos
        $filtros = [
            'categoria' => $categoria,
            'subcategoria' => $subcategoria,
            'subsubcategoria' => $subsubcategoria,
        ];

        // Buscar produtos (simulação)
        $produtos = $this->buscarProdutos($filtros);

        // Configurar página para AdminLTE
        $pageConfig = [
            'title' => $titulos['subsubcategoria'] ?? $titulos['subcategoria'] ?? $titulos['categoria'],
            'breadcrumb' => $breadcrumb,
        ];

        return view('catalogo.index', compact('titulos', 'breadcrumb', 'filtros', 'produtos', 'pageConfig'));
    }

    /**
     * Mapear URLs para títulos amigáveis
     */
    private function mapearTitulos($categoria, $subcategoria = null, $subsubcategoria = null)
    {
        $titulos = [];

        // Mapeamento de categorias principais
        $categoriasMap = [
            'masculino' => 'Moda Masculina',
            'feminino' => 'Moda Feminina',
            'eletronicos' => 'Eletrônicos',
            'casa' => 'Casa & Decoração',
            'esporte' => 'Esporte & Lazer',
            'cama-mesa-banho' => 'Cama, Mesa e Banho',
        ];

        // Mapeamento de subcategorias
        $subcategoriasMap = [
            // Moda Masculina
            'camisetas' => 'Camisetas',
            'calcas' => 'Calças',
            'calcados' => 'Calçados',
            'acessorios' => 'Acessórios',
            'roupa-intima' => 'Roupa Íntima',

            // Moda Feminina
            'vestidos' => 'Vestidos',
            'blusas' => 'Blusas',
            'calcas-saias' => 'Calças e Saias',

            // Eletrônicos
            'smartphones' => 'Smartphones',
            'computadores' => 'Computadores',
            'audio' => 'Áudio',

            // Casa
            'moveis' => 'Móveis',
            'decoracao' => 'Decoração',

            // Esporte
            'fitness' => 'Fitness',
            'acampamento' => 'Acampamento',
            'ciclismo' => 'Ciclismo',
        ];

        // Mapeamento de subsubcategorias
        $subsubcategoriasMap = [
            // Camisetas Masculinas
            'basicas' => 'Básicas',
            'estampadas' => 'Estampadas',
            'polo' => 'Polo',
            'manga-longa' => 'Manga Longa',

            // Calças Masculinas
            'jeans' => 'Jeans',
            'social' => 'Social',
            'moletom' => 'Moletom',
            'cargo' => 'Cargo',

            // Calçados Masculinos
            'tenis' => 'Tênis',
            'sapatos' => 'Sapatos',
            'sandalias' => 'Sandálias',

            // Acessórios Masculinos
            'relogios' => 'Relógios',
            'oculos' => 'Óculos',
            'cintos' => 'Cintos',
            'bones' => 'Bonés',

            // Roupa Íntima Masculina
            'cuecas' => 'Cuecas',
            'meias' => 'Meias',

            // Vestidos Femininos
            'festa' => 'Festa',
            'casual' => 'Casual',
            'longos' => 'Longos',
            'curto' => 'Curto',

            // Blusas Femininas
            'camisetas' => 'Camisetas',
            'cropped' => 'Cropped',
            'social' => 'Social',
            'regatas' => 'Regatas',

            // Calças Femininas
            'jeans' => 'Jeans',
            'legging' => 'Legging',

            // Saias
            'longas' => 'Longas',
            'curtas' => 'Curtas',
            'midi' => 'Midi',

            // Calçados Femininos
            'saltos' => 'Saltos',
            'tenis' => 'Tênis',
            'sandalias' => 'Sandálias',
            'rasteiras' => 'Rasteiras',

            // Saltos
            'alto' => 'Alto',
            'medio' => 'Médio',
            'anabela' => 'Anabela',

            // Acessórios Femininos
            'bolsas' => 'Bolsas',
            'joias' => 'Joias',
            'cintos' => 'Cintos',

            // Bolsas
            'clutch' => 'Clutch',
            'tiracolo' => 'Tiracolo',
            'mochila' => 'Mochila',

            // Joias
            'colares' => 'Colares',
            'brincos' => 'Brinco',
            'pulseiras' => 'Pulseiras',

            // Roupa Íntima Feminina
            'sutias' => 'Sutiãs',
            'calcinhas' => 'Calcinhas',
            'pijamas' => 'Pijamas',

            // Smartphones
            'android' => 'Android',
            'iphone' => 'iPhone',

            // Computadores
            'notebooks' => 'Notebooks',
            'desktops' => 'Desktops',
            'acessorios' => 'Acessórios',

            // Acessórios de Computador
            'mouse' => 'Mouse',
            'teclado' => 'Teclado',
            'monitor' => 'Monitor',

            // Áudio
            'fones' => 'Fones de Ouvido',
            'caixas-som' => 'Caixas de Som',

            // Móveis
            'sala' => 'Sala',
            'quarto' => 'Quarto',
            'cozinha' => 'Cozinha',

            // Decoração
            'quadros' => 'Quadros',
            'vasos' => 'Vasos',
            'cortinas' => 'Cortinas',

            // Cama, Mesa e Banho
            'lencóis' => 'Lençóis',
            'toalhas' => 'Toalhas',
            'edredons' => 'Edredons',

            // Fitness
            'roupas' => 'Roupas',
            'acessorios' => 'Acessórios',
            'equipamentos' => 'Equipamentos',
        ];

        $titulos['categoria'] = $categoriasMap[$categoria] ?? ucfirst($categoria);
        $titulos['subcategoria'] = $subcategoria ? ($subcategoriasMap[$subcategoria] ?? ucfirst($subcategoria)) : null;
        $titulos['subsubcategoria'] = $subsubcategoria ? ($subsubcategoriasMap[$subsubcategoria] ?? ucfirst($subsubcategoria)) : null;

        return $titulos;
    }

    /**
     * Construir breadcrumb
     */
    private function construirBreadcrumb($categoria, $subcategoria = null, $subsubcategoria = null)
    {
        $breadcrumb = [
            ['text' => 'Home', 'url' => route('home')],
        ];

        $titulos = $this->mapearTitulos($categoria, $subcategoria, $subsubcategoria);

        // Adicionar catálogo
        $breadcrumb[] = ['text' => 'Catálogo', 'url' => '#'];

        if ($categoria) {
            $breadcrumb[] = [
                'text' => $titulos['categoria'],
                'url' => route('catalogo.categoria', ['categoria' => $categoria])
            ];
        }

        if ($subcategoria) {
            $breadcrumb[] = [
                'text' => $titulos['subcategoria'],
                'url' => route('catalogo.categoria', ['categoria' => $categoria, 'subcategoria' => $subcategoria])
            ];
        }

        if ($subsubcategoria) {
            $breadcrumb[] = [
                'text' => $titulos['subsubcategoria'],
                'url' => route('catalogo.categoria', [
                    'categoria' => $categoria,
                    'subcategoria' => $subcategoria,
                    'subsubcategoria' => $subsubcategoria
                ])
            ];
        }

        return $breadcrumb;
    }

    /**
     * Buscar produtos com base nos filtros
     */
    private function buscarProdutos($filtros)
    {
        // Simulação - você implementará com seu modelo Product
        $produtos = [
            [
                'id' => 1,
                'nome' => 'Produto Exemplo 1',
                'preco' => 99.90,
                'preco_original' => 149.90,
                'desconto' => 33,
                'imagem' => 'https://placehold.co/300x300?text=Hello+World',
                'avaliacao' => 4.5,
                'avaliacoes_count' => 128,
                'estoque' => true,
            ],
            [
                'id' => 2,
                'nome' => 'Produto Exemplo 2',
                'preco' => 79.90,
                'preco_original' => null,
                'desconto' => 0,
                'imagem' => 'https://placehold.co/300x300?text=Hello+World',
                'avaliacao' => 4.0,
                'avaliacoes_count' => 64,
                'estoque' => true,
            ],
            [
                'id' => 3,
                'nome' => 'Produto Exemplo 3',
                'preco' => 199.90,
                'preco_original' => 299.90,
                'desconto' => 33,
                'imagem' => 'https://placehold.co/300x300?text=Hello+World',
                'avaliacao' => 5.0,
                'avaliacoes_count' => 256,
                'estoque' => true,
            ],
            // Adicione mais produtos conforme necessário
        ];

        return $produtos;
    }

    /**
     * Página de Promoções
     */
    public function promocoes()
    {
        $titulos = [
            'pagina' => 'Promoções',
            'descricao' => 'Os melhores produtos com desconto!'
        ];

        $breadcrumb = [
            ['text' => 'Home', 'url' => route('home')],
            ['text' => 'Promoções', 'url' => route('promocoes')],
        ];

        // Buscar produtos em promoção
        $produtos = $this->buscarProdutos(['promocao' => true]);

        return view('catalogo.promocoes', compact('titulos', 'breadcrumb', 'produtos'));
    }

    /**
     * Página de Novidades
     */
    public function novidades()
    {
        $titulos = [
            'pagina' => 'Novidades',
            'descricao' => 'Confira os lançamentos!'
        ];

        $breadcrumb = [
            ['text' => 'Home', 'url' => route('home')],
            ['text' => 'Novidades', 'url' => route('novidades')],
        ];

        // Buscar produtos novos
        $produtos = $this->buscarProdutos(['novidade' => true]);

        return view('catalogo.novidades', compact('titulos', 'breadcrumb', 'produtos'));
    }

    /**
     * Página de Mais Vendidos
     */
    public function maisVendidos()
    {
        $titulos = [
            'pagina' => 'Mais Vendidos',
            'descricao' => 'Os produtos preferidos dos nossos clientes!'
        ];

        $breadcrumb = [
            ['text' => 'Home', 'url' => route('home')],
            ['text' => 'Mais Vendidos', 'url' => route('mais-vendidos')],
        ];

        // Buscar produtos mais vendidos
        $produtos = $this->buscarProdutos(['mais_vendidos' => true]);

        return view('catalogo.mais-vendidos', compact('titulos', 'breadcrumb', 'produtos'));
    }
}
