@extends('adminlte::page')

@section('title', $titulos['subsubcategoria'] ?? $titulos['subcategoria'] ?? $titulos['categoria'])

@section('content_header')
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach($breadcrumb as $item)
                @if(!$loop->last)
                    <li class="breadcrumb-item">
                        <a href="{{ $item['url'] }}">{{ $item['text'] }}</a>
                    </li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">{{ $item['text'] }}</li>
                @endif
            @endforeach
        </ol>
    </nav>

    <!-- Título da Página -->
    <h1 class="m-0 text-dark">
        {{ $titulos['subsubcategoria'] ?? $titulos['subcategoria'] ?? $titulos['categoria'] }}
        @if($titulos['subsubcategoria'] && $titulos['subcategoria'])
            <small class="text-muted">
                {{ $titulos['subcategoria'] }} > {{ $titulos['subsubcategoria'] }}
            </small>
        @elseif($titulos['subcategoria'])
            <small class="text-muted">Categoria: {{ $titulos['categoria'] }}</small>
        @endif
    </h1>
@stop

@section('content')
<div class="container-fluid">
    <!-- Filtros e Ordenação -->
    <div class="row mb-3">
        <div class="col-md-8">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-default active">Relevância</button>
                <button type="button" class="btn btn-default">Menor Preço</button>
                <button type="button" class="btn btn-default">Maior Preço</button>
                <button type="button" class="btn btn-default">Mais Vendidos</button>
                <button type="button" class="btn btn-default">Melhor Avaliados</button>
            </div>
        </div>
        <div class="col-md-4 text-right">
            <span class="text-muted">{{ count($produtos) }} produtos encontrados</span>
        </div>
    </div>

    <!-- Grid de Produtos -->
    <div class="row">
        @foreach($produtos as $produto)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <!-- Badge de Desconto -->
                @if($produto['desconto'] > 0)
                <div class="ribbon-wrapper">
                    <div class="ribbon bg-danger">
                        -{{ $produto['desconto'] }}%
                    </div>
                </div>
                @endif
                
                <!-- Imagem do Produto -->
                <a href="{{ route('produto.detalhe', $produto['id']) }}">
                    <img src="{{ $produto['imagem'] }}" class="card-img-top" alt="{{ $produto['nome'] }}" style="height: 200px; object-fit: cover;">
                </a>
                
                <div class="card-body">
                    <!-- Nome do Produto -->
                    <h5 class="card-title">
                        <a href="{{ route('produto.detalhe', $produto['id']) }}" class="text-dark">
                            {{ $produto['nome'] }}
                        </a>
                    </h5>
                    
                    <!-- Avaliação -->
                    <div class="mb-2">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= floor($produto['avaliacao']))
                                <i class="fas fa-star text-warning"></i>
                            @elseif($i - 0.5 <= $produto['avaliacao'])
                                <i class="fas fa-star-half-alt text-warning"></i>
                            @else
                                <i class="far fa-star text-warning"></i>
                            @endif
                        @endfor
                        <small class="text-muted">({{ $produto['avaliacoes_count'] }})</small>
                    </div>
                    
                    <!-- Preço -->
                    <div class="mb-3">
                        @if($produto['preco_original'])
                            <span class="text-muted text-decoration-line-through mr-2">
                                R$ {{ number_format($produto['preco_original'], 2, ',', '.') }}
                            </span>
                        @endif
                        <span class="h5 text-danger">
                            R$ {{ number_format($produto['preco'], 2, ',', '.') }}
                        </span>
                    </div>
                    
                    <!-- Botão de Adicionar ao Carrinho -->
                    <button class="btn btn-outline-primary btn-block add-to-cart" 
                            data-product-id="{{ $produto['id'] }}">
                        <i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho
                    </button>
                </div>
                
                <!-- Card Footer -->
                <div class="card-footer">
                    <small class="text-muted">
                        <i class="fas fa-check-circle text-success"></i> Em estoque
                    </small>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Paginação -->
    @if(count($produtos) >= 12)
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Anterior</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Próxima</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endif
    
    <!-- Mensagem quando não há produtos -->
    @if(count($produtos) == 0)
    <div class="row">
        <div class="col-12">
            <div class="callout callout-info">
                <h5><i class="fas fa-info-circle"></i> Nenhum produto encontrado</h5>
                <p>Não encontramos produtos nesta categoria no momento. Tente outras categorias.</p>
            </div>
        </div>
    </div>
    @endif
</div>
@stop

@section('css')
    <style>
        .product-card {
            transition: transform 0.3s;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .ribbon-wrapper {
            position: absolute;
            top: -3px;
            right: -3px;
            overflow: hidden;
            width: 85px;
            height: 88px;
            z-index: 10;
        }
        .ribbon {
            font-size: 12px;
            font-weight: bold;
            color: #fff;
            text-align: center;
            transform: rotate(45deg);
            position: relative;
            padding: 7px 0;
            left: -5px;
            top: 15px;
            width: 120px;
        }
    </style>
@stop

@section('js')
<script>
$(document).ready(function() {
    // Adicionar ao carrinho
    $('.add-to-cart').click(function() {
        const productId = $(this).data('product-id');
        const button = $(this);
        
        // Mostrar loading
        button.html('<i class="fas fa-spinner fa-spin"></i> Adicionando...');
        button.prop('disabled', true);
        
        $.ajax({
            url: '{{ route("carrinho.adicionar") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                product_id: productId,
                quantity: 1
            },
            success: function(response) {
                // Atualizar contador do carrinho
                $('#cart-count').text(response.cartCount);
                
                // Mostrar notificação do AdminLTE
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Sucesso!',
                    body: 'Produto adicionado ao carrinho!',
                    autohide: true,
                    delay: 3000
                });
                
                // Restaurar botão
                button.html('<i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho');
                button.prop('disabled', false);
            },
            error: function(xhr) {
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Erro!',
                    body: 'Erro ao adicionar produto ao carrinho.',
                    autohide: true,
                    delay: 3000
                });
                
                // Restaurar botão
                button.html('<i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho');
                button.prop('disabled', false);
            }
        });
    });
    
    // Ordenação
    $('.btn-group .btn').click(function() {
        $('.btn-group .btn').removeClass('active');
        $(this).addClass('active');
        
        // Aqui você implementaria a lógica de ordenação
        console.log('Ordenar por:', $(this).text());
    });
});
</script>
@stop