@extends('layout.sidebar')

@section('tab_content')
<div class="tab-pane fade show tabela" id="v-pills-produtos" role="tabpanel" aria-labelledby="v-pills-produtos-tab">
    <div class="conteudo-aba">
        
            <h1 id="titulo-aba">Produtos</h1>

            <hr id="divider">
    
            <nav class="navbar navbar-light bg-light">
            
                        <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">

                        <li class="nav-item cadastro">
                            <button  type="button" class="btn bg-success nav-link" data-bs-toggle="modal" data-bs-target="#produtosCadastro">
                            <svg class="crud-icon me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"/>
                            </svg>Novo produto</button>
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

                        <li class="nav-item cadastro">
                            <button  type="button" class="btn btn-warning bg-warning nav-link icon-category" data-bs-toggle="modal" data-bs-target="#categories-tab">
                            <svg class="crud-icon me-2"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tags" viewBox="0 0 16 16">
                            <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
                            <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
                            </svg>Gerenciar categorias</button>
                        </li>
                            
                            
                        </ul>      
                        
                        
                    
                    </nav>
                    <div class="collapse" id="collapseExample">
                        
                            @include('search.pesquisa-produtos')
                        
                    </div>


                
                
                <div class="tabela overflow-scroll">
                    @include('tables/tabela-produtos')
                </div>




            @include('alerts.products-situations')
            @include('create.cadastro-produto')
            @include('update.edita-produto')
            @include('delete.deletar-produtos')
            @include('delete.deletar-categoria')
            @include('tabs.categories')
            </div>
</div>

@endsection
