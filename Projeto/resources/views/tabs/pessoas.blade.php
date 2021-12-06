@extends('layout.sidebar')

@section('tab_content')
<div class="tab-pane fade show tabela" id="v-pills-pessoas" role="tabpanel" aria-labelledby="v-pills-pessoas-tab">
    <div class="conteudo-aba">
        
            <h1 id="titulo-aba">Pessoas</h1>

            <hr id="divider">
    
            <nav class="navbar navbar-light bg-light">
            
                        <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">

                        <li class="nav-item cadastro">
                            <button  type="button" class="btn bg-success nav-link" data-bs-toggle="modal" data-bs-target="#pessoasCadastro">
                            <svg class="crud-icon me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>Nova pessoa</button>
                        </li>

                        <li class="nav-item cadastro">
                            <p>
                            <button id="#search-filter" class="btn bg-dark btn-warning position-relative nav-link " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
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
                        
                            @include('search.pesquisa-pessoas')
                        
                    </div>


                
                
                <div class="tabela overflow-scroll">
                    @include('tables/tabela-pessoas')
                </div>




            @include('alerts.people-situations')
            @include('create.cadastro-pessoa')
            @include('update.edita-pessoa')
            @include('delete.deletar-pessoas')
            @include('delete.cant-delete')
            </div>
</div>

@endsection
