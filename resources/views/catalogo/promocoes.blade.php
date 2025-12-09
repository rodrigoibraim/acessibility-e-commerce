@extends('adminlte::page')

@section('title', 'Promoções')

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
        {{ $titulos['pagina'] }}
        <small class="text-muted">{{ $titulos['descricao'] }}</small>
    </h1>
@stop

@section('content')
<div class="container-fluid">
    <!-- Banner de Promoções -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-fire"></i> PROMOÇÕES RELÂMPAGO!</h5>
                Aproveite nossas ofertas especiais com até 70% de desconto! Oferta válida por tempo limitado.
            </div>
        </div>
    </div>

    <!-- Filtros de Desconto -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-filter"></i> Filtros
                    </h3>
                </div>
                <div class="card-body">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default active">Todos</button>
                        <button type="button" class="btn btn-default">Até 30%</button>
                        <button type="button" class="btn btn-default">31% - 50%</button>
                        <button type="button" class="btn btn-default">Acima de 50%</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grid de Produtos -->
    <div class="row">
        @foreach($produtos as $produto)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <!-- Badge de Desconto (obrigatório para promoções) -->
                <div class="ribbon-wrapper">
                    <div class="ribbon bg-danger">
                        -{{ $produto['desconto'] }}%
                    </div>
                </div>
                
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
                    <button class="btn btn-primary btn-block add-to-cart" 
                            data-product-id="{{ $produto['id'] }}">
                        <i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop

@section('css')
    <style>
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
    // Mesmo script do carrinho
    $('.add-to-cart').click(function() {
        const productId = $(this).data('product-id');
        const button = $(this);
        
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
                $('#cart-count').text(response.cartCount);
                
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Sucesso!',
                    body: 'Produto adicionado ao carrinho!',
                    autohide: true,
                    delay: 3000
                });
                
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
                
                button.html('<i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho');
                button.prop('disabled', false);
            }
        });
    });
});
</script>
@stop