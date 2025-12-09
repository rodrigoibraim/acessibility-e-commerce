@extends('adminlte::page')

@section('title', $produto['nome'])

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
<h1 class="m-0 text-dark">{{ $produto['nome'] }}</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Coluna de Imagens -->
        <div class="col-md-6">
            <!-- Imagem Principal -->
            <div class="card">
                <div class="card-body text-center">
                    <img id="mainProductImage" src="{{ $produto['imagem'] }}"
                        class="img-fluid" alt="{{ $produto['nome'] }}"
                        style="max-height: 500px;">
                </div>
            </div>

            <!-- Miniaturas -->
            @if(isset($produto['imagens']) && count($produto['imagens']) > 1)
            <div class="row mt-3">
                @foreach($produto['imagens'] as $index => $imagem)
                <div class="col-3">
                    <div class="thumbnail-item {{ $index == 0 ? 'active' : '' }}"
                        data-image="{{ $imagem }}">
                        <img src="{{ $imagem }}" class="img-fluid img-thumbnail"
                            alt="Miniatura {{ $index + 1 }}"
                            style="cursor: pointer; height: 80px; object-fit: cover;">
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            <!-- Compartilhar -->
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-share-alt"></i> Compartilhar
                    </h3>
                </div>
                <div class="card-body">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default">
                            <i class="fab fa-facebook-f"></i>
                        </button>
                        <button type="button" class="btn btn-default">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button type="button" class="btn btn-default">
                            <i class="fab fa-whatsapp"></i>
                        </button>
                        <button type="button" class="btn btn-default">
                            <i class="fas fa-envelope"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Coluna de Informações -->
        <div class="col-md-6">
            <!-- Avaliação -->
            <div class="mb-3">
                <div class="d-flex align-items-center">
                    <div class="mr-2">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <=floor($produto['avaliacao']))
                            <i class="fas fa-star text-warning"></i>
                            @elseif($i - 0.5 <= $produto['avaliacao'])
                                <i class="fas fa-star-half-alt text-warning"></i>
                                @else
                                <i class="far fa-star text-warning"></i>
                                @endif
                                @endfor
                    </div>
                    <span class="text-muted">
                        {{ $produto['avaliacao'] }} ({{ $produto['avaliacoes_count'] }} avaliações)
                    </span>
                    <span class="badge bg-success ml-3">
                        <i class="fas fa-check"></i> Em estoque
                    </span>
                </div>
            </div>

            <!-- Preço -->
            <div class="mb-4">
                @if($produto['preco_original'])
                <h3 class="text-muted text-decoration-line-through mb-0">
                    R$ {{ number_format($produto['preco_original'], 2, ',', '.') }}
                </h3>
                @endif
                <h1 class="text-danger mb-2">
                    R$ {{ number_format($produto['preco'], 2, ',', '.') }}
                </h1>
                @if($produto['desconto'] > 0)
                <span class="badge bg-danger">
                    Economize {{ $produto['desconto'] }}%
                </span>
                @endif
            </div>

            <!-- Descrição Curta -->
            <div class="mb-4">
                <p class="lead">{{ $produto['descricao'] }}</p>
            </div>

            <!-- Opções -->
            <div class="card mb-4">
                <div class="card-body">
                    <!-- Cores -->
                    @if(isset($produto['cores']) && count($produto['cores']) > 0)
                    <div class="mb-3">
                        <h5>Cor:</h5>
                        <div class="btn-group" role="group">
                            @foreach($produto['cores'] as $cor)
                            <button type="button" class="btn btn-outline-secondary color-option"
                                data-color="{{ $cor['nome'] }}"
                                title="{{ $cor['nome'] }}"
                                style="{{ isset($cor['codigo']) ? 'background-color: ' . $cor['codigo'] . '; color: ' . $cor['codigo'] : '' }}">
                                {{ isset($cor['codigo']) ? '' : $cor['nome'] }}
                            </button>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Tamanhos -->
                    @if(isset($produto['tamanhos']) && count($produto['tamanhos']) > 0)
                    <div class="mb-3">
                        <h5>Tamanho:</h5>
                        <div class="btn-group" role="group">
                            @foreach($produto['tamanhos'] as $tamanho)
                            <button type="button" class="btn btn-outline-secondary size-option"
                                data-size="{{ $tamanho }}">
                                {{ $tamanho }}
                            </button>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Quantidade -->
                    <div class="mb-3">
                        <h5>Quantidade:</h5>
                        <div class="input-group" style="width: 150px;">
                            <button class="btn btn-outline-secondary" type="button" id="decrease-qty">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" class="form-control text-center"
                                id="quantity" value="1" min="1" max="{{ $produto['estoque'] ?? 10 }}">
                            <button class="btn btn-outline-secondary" type="button" id="increase-qty">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <small class="text-muted">
                            Disponível: {{ $produto['estoque'] ?? 10 }} unidades
                        </small>
                    </div>

                    <!-- Botões de Ação -->
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-lg add-to-cart"
                            data-product-id="{{ $produto['id'] }}">
                            <i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho
                        </button>
                        <button class="btn btn-outline-danger btn-lg add-to-favorites"
                            data-product-id="{{ $produto['id'] }}">
                            <i class="fas fa-heart"></i> Adicionar aos Favoritos
                        </button>
                    </div>
                </div>
            </div>

            <!-- Informações Adicionais -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle"></i> Informações do Produto
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        @if(isset($produto['marca']))
                        <tr>
                            <td><strong>Marca:</strong></td>
                            <td>{{ $produto['marca'] }}</td>
                        </tr>
                        @endif
                        @if(isset($produto['sku']))
                        <tr>
                            <td><strong>SKU:</strong></td>
                            <td>{{ $produto['sku'] }}</td>
                        </tr>
                        @endif
                        @if(isset($produto['categoria']))
                        <tr>
                            <td><strong>Categoria:</strong></td>
                            <td>{{ $titulos['subsubcategoria'] ?? $titulos['subcategoria'] ?? $titulos['categoria'] }}</td>
                        </tr>
                        @endif
                        @if(isset($produto['estoque']))
                        <tr>
                            <td><strong>Estoque:</strong></td>
                            <td>{{ $produto['estoque'] }} unidades</td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Abas de Detalhes -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header p-0">
                    <ul class="nav nav-tabs" id="productTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="description-tab" data-toggle="tab"
                                href="#description" role="tab">Descrição</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="specs-tab" data-toggle="tab"
                                href="#specs" role="tab">Especificações</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="reviews-tab" data-toggle="tab"
                                href="#reviews" role="tab">Avaliações</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="productTabsContent">
                        <!-- Descrição -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            {!! $produto['descricao_longa'] ?? $produto['descricao'] !!}
                        </div>

                        <!-- Especificações -->
                        <div class="tab-pane fade" id="specs" role="tabpanel">
                            @if(isset($produto['especificacoes']) && count($produto['especificacoes']) > 0)
                            <table class="table table-striped">
                                <tbody>
                                    @foreach($produto['especificacoes'] as $espec)
                                    <tr>
                                        <td style="width: 30%;"><strong>{{ $espec['nome'] }}</strong></td>
                                        <td>{{ $espec['valor'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <p class="text-muted">Nenhuma especificação disponível.</p>
                            @endif
                        </div>

                        <!-- Avaliações -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            @if(isset($produto['avaliacoes']) && count($produto['avaliacoes']) > 0)
                            @foreach($produto['avaliacoes'] as $avaliacao)
                            <div class="border-bottom pb-3 mb-3">
                                <div class="d-flex justify-content-between">
                                    <h5>{{ $avaliacao['nome'] }}</h5>
                                    <small class="text-muted">{{ $avaliacao['data'] }}</small>
                                </div>
                                <div class="mb-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <=$avaliacao['avaliacao'])
                                        <i class="fas fa-star text-warning"></i>
                                        @else
                                        <i class="far fa-star text-warning"></i>
                                        @endif
                                        @endfor
                                </div>
                                <p>{{ $avaliacao['comentario'] }}</p>
                                @if($avaliacao['recomenda'])
                                <span class="badge bg-success">
                                    <i class="fas fa-thumbs-up"></i> Recomenda
                                </span>
                                @endif
                            </div>
                            @endforeach
                            @else
                            <p class="text-muted">Nenhuma avaliação disponível.</p>
                            @endif

                            <!-- Botão para adicionar avaliação -->
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addReviewModal">
                                <i class="fas fa-edit"></i> Escrever Avaliação
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Produtos Relacionados -->
    @if(isset($produtosRelacionados) && count($produtosRelacionados) > 0)
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="mb-4">Produtos Relacionados</h3>
            <div class="row">
                @foreach($produtosRelacionados as $produtoRel)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100">
                        <a href="{{ route('produto.detalhe', $produtoRel['id']) }}">
                            <img src="{{ $produtoRel['imagem'] }}" class="card-img-top"
                                alt="{{ $produtoRel['nome'] }}"
                                style="height: 200px; object-fit: cover;">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('produto.detalhe', $produtoRel['id']) }}" class="text-dark">
                                    {{ $produtoRel['nome'] }}
                                </a>
                            </h5>
                            <div class="mb-2">
                                @if($produtoRel['preco_original'])
                                <span class="text-muted text-decoration-line-through mr-2">
                                    R$ {{ number_format($produtoRel['preco_original'], 2, ',', '.') }}
                                </span>
                                @endif
                                <span class="h5 text-danger">
                                    R$ {{ number_format($produtoRel['preco'], 2, ',', '.') }}
                                </span>
                            </div>
                            <button class="btn btn-outline-primary btn-block add-to-cart"
                                data-product-id="{{ $produtoRel['id'] }}">
                                <i class="fas fa-shopping-cart"></i> Adicionar
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>
@stop

@section('css')
<style>
    .thumbnail-item {
        border: 2px solid transparent;
        border-radius: 4px;
    }

    .thumbnail-item.active {
        border-color: #007bff;
    }

    .color-option,
    .size-option {
        min-width: 40px;
    }

    .color-option.active,
    .size-option.active {
        background-color: #007bff;
        color: white !important;
    }

    .product-image {
        transition: transform 0.3s;
    }

    .product-image:hover {
        transform: scale(1.05);
    }
</style>
@stop

@section('js')
<script>
    $(document).ready(function() {
        // Trocar imagem principal ao clicar na miniatura
        $('.thumbnail-item').click(function() {
            $('.thumbnail-item').removeClass('active');
            $(this).addClass('active');
            $('#mainProductImage').attr('src', $(this).data('image'));
        });

        // Selecionar cor
        $('.color-option').click(function() {
            $('.color-option').removeClass('active');
            $(this).addClass('active');
        });

        // Selecionar tamanho
        $('.size-option').click(function() {
            $('.size-option').removeClass('active');
            $(this).addClass('active');
        });

        // Controlar quantidade
        $('#decrease-qty').click(function() {
            var qty = parseInt($('#quantity').val());
            if (qty > 1) {
                $('#quantity').val(qty - 1);
            }
        });

        $('#increase-qty').click(function() {
            var qty = parseInt($('#quantity').val());
            var max = parseInt($('#quantity').attr('max'));
            if (qty < max) {
                $('#quantity').val(qty + 1);
            }
        });

        // Adicionar ao carrinho
        $('.add-to-cart').click(function() {
            const productId = $(this).data('product-id');
            const quantity = $('#quantity').val();
            const color = $('.color-option.active').data('color') || null;
            const size = $('.size-option.active').data('size') || null;

            const button = $(this);
            button.html('<i class="fas fa-spinner fa-spin"></i> Adicionando...');
            button.prop('disabled', true);

            $.ajax({
                url: '{{ route("carrinho.adicionar") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    quantity: quantity,
                    color: color,
                    size: size
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

        // Adicionar aos favoritos
        $('.add-to-favorites').click(function() {
            const productId = $(this).data('product-id');
            const button = $(this);

            $.ajax({
                url: '{{ route("favoritos.adicionar") }}', // Você precisa criar esta rota
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId
                },
                success: function(response) {
                    if (response.status === 'added') {
                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'Sucesso!',
                            body: 'Produto adicionado aos favoritos!',
                            autohide: true,
                            delay: 3000
                        });
                        button.removeClass('btn-outline-danger').addClass('btn-danger');
                        button.html('<i class="fas fa-heart"></i> Nos Favoritos');
                    } else {
                        $(document).Toasts('create', {
                            class: 'bg-info',
                            title: 'Info!',
                            body: 'Produto removido dos favoritos.',
                            autohide: true,
                            delay: 3000
                        });
                        button.removeClass('btn-danger').addClass('btn-outline-danger');
                        button.html('<i class="fas fa-heart"></i> Adicionar aos Favoritos');
                    }
                },
                error: function(xhr) {
                    $(document).Toasts('create', {
                        class: 'bg-danger',
                        title: 'Erro!',
                        body: 'Erro ao gerenciar favoritos.',
                        autohide: true,
                        delay: 3000
                    });
                }
            });
        });
    });
</script>
@stop