@extends('layout.sidebar')

@section('tab_content')
<div class="tab-pane fade show tabela" id="v-pills-compras" role="tabpanel" aria-labelledby="v-pills-compras-tab">
    <div class="conteudo-aba">
        
            <h1 id="titulo-aba">Vendas</h1>

            <hr id="divider">
    
            <nav class="navbar navbar-light bg-light">
            
                        <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">

                        <li class="nav-item cadastro">
                            <button  type="button" class="btn bg-success nav-link" data-bs-toggle="modal"
                             @if(count($people) == 0)data-bs-target="#nosupplier" @else data-bs-target="#comprasCadastro" @endif >
                            <svg class="crud-icon me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                            </svg>Cadastrar Venda</button>
                        </li>

                        <li class="nav-item cadastro">
                            <p>
                            <button id="#search-filter" class="btn bg-dark btn-warning position-relative nav-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                            <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z"/>
                            </svg>Filtrar

                            <span id="badge" class="visually-hidden position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                
                            </span>

                            </button>
                            </p>
                        </li>                
                    
                    </ul>            
                    
                    </nav>

                    <div class="collapse" id="collapseExample">
                        
                            @include('search.pesquisa-compras')
                        
                    </div>

                  
                        <div class="tab-pane fade show active" id="pills-buys" role="tabpanel" aria-labelledby="pills-buys-tab">
                          @include('tables/tabela-compras')
                        </div>

                    
                    




            @include('alerts.nosupplier')
            @include('alerts.buy-situations')
            @include('create.cadastro-compras')
            @include('update.edita-compra')
            @include('delete.deletar-compras')
            </div>
</div>

@endsection
