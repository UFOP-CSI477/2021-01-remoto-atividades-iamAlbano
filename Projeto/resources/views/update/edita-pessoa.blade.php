<!-- Modal Edição de Pessoas -->

@foreach($people as $pessoa)
<div class="modal fade" id="pessoa-id-{{$pessoa->person_id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"> 
                
                {{$pessoa->name}}</h5>
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav abas-cadastro nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-pessoa-tab-{{$pessoa->id}}" data-bs-toggle="pill" data-bs-target="#pills-pessoa-{{$pessoa->id}}" type="button" role="tab" aria-controls="pills-home-{{$pessoa->id}}" aria-selected="true">
                        <svg class="crud-icon me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>Pessoa</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class=" nav-link" id="pills-endereco-tab-{{$pessoa->id}}" data-bs-toggle="pill" data-bs-target="#pills-endereco-{{$pessoa->id}}" type="button" role="tab" aria-controls="pills-endereco-{{$pessoa->id}}" aria-selected="false">
                        <svg class="crud-icon me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                        </svg>Endereço</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link position-relative" id="pills-info-tab-{{$pessoa->id}}" data-bs-toggle="pill" data-bs-target="#pills-info-{{$pessoa->id}}" type="button" role="tab" aria-controls="pills-info-{{$pessoa->id}}" aria-selected="false">
                        <svg class="crud-icon me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>Observações
                        
                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-primary border border-light rounded-circle @if($pessoa->observations == NULL)visually-hidden @endif">
                        
                        </span></button>
                    </li>

                    
                </ul>

            <hr id="divider">

            <form class="row g-3 text-start" method="POST" action="/pessoas/update/{{$pessoa->person_id}}">
            @csrf
            @method('PUT')
                <div class="tab-content" id="pills-tabContent-{{$pessoa->id}}">
                        <div class="tab-pane fade show active" id="pills-pessoa-{{$pessoa->id}}" role="tabpanel" aria-labelledby="pills-pessoa-tab-{{$pessoa->id}}">
                            <div class="container"> 
                                <div class="row p-2">
                                    <div class="col-md-6 ">
                                        <label for="name" class="form-label">Nome</label>
                                        <input type="text" class="form-control" value="{{$pessoa->name}}" placeholder="{{$pessoa->name}}" id="name" name="name" required>
                                    </div>

                                    <div class="col-md-6 ">
                                        <label for="fantasy_name" class="form-label">Nome Fantasia (opcional)</label>
                                        <input type="text" class="form-control" id="fantasy_name" name="fantasy_name"value="{{$pessoa->fantasy_name}}" placeholder="{{$pessoa->fantasy_name}}">
                                    </div>
                                </div>

                                <div class="row p-2">
                                    <div class="col-md-5">
                                        <label for="category" class="form-label">Categoria</label>
                                        <input readonly type="text" class="form-control" id="category" name="category"value="{{$pessoa->category}}" placeholder="{{$pessoa->category}}">
                                        
                                    </div>

                                    <div class="col-md-4">
                                        <label for="type" class="form-label">Tipo de Pessoa</label>
                                        <input type="text" class="form-control"  id="type_update" value="{{$pessoa->type}}" name="type_update" readonly>
                                        </select>
                                    </div>

                                    <div class="col-md-3 ">

                                        <div >
                                            <label for="blacklist" class="form-label">Adicionar a blacklist?</label>
                                            <select id="blacklist" name="blacklist" class="form-select">
                                                <option  value="0" @if($pessoa->blacklist == "0") selected @endif>Não</option>
                                                <option value="1" @if($pessoa->blacklist == "1") selected @endif>Sim</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                
                                
                                </div>
                            
                                    <div class="row p-2">
                                        <div class="col-md-6 ">
                                            <label for="cpf" class="form-label">
                                                CPF/CNPJ                                   
                                            </label>
                                            <input type="text"  id="cpf_cnpj" name="cpf_cnpj" value="{{$pessoa->cpf_cnpj}}" 
                                            @if($pessoa->type == "Jurídica") onkeypress="$(this).mask('00.000.000/0000-00');"
                                            @else onkeypress="$(this).mask('000.000.000-00');"
                                            @endif
                                            placeholder="{{$pessoa->cpf_cnpj}}" class="form-control" required>
                                        </div>

                                        <div class="col-md-6 ">
                                            <label for="rg" class="form-label">
                                                RG                                  
                                            </label>
                                            <input type="text" id="rg" name="rg" value="{{$pessoa->rg}}" placeholder="{{$pessoa->rg}}" @if($pessoa->type == "Jurídica")disabled @endif
                                             class="form-control" id="rg">
                                        </div> 
                                    </div>
                                    
                      
                                <div class="row p-2">

                                    <div class="col-md-4 ">
                                    <label for="email" class="form-label">E-mail</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{$pessoa->email}}" placeholder="{{$pessoa->email}}" aria-label="email" required>
                                    </div>
                                    <div class="col-md-4 ">
                                        <label for="celular 1" class="form-label">Telefone Celular </label>
                                        <input type="text" id="smartphone" name="smartphone" class="form-control cel-sp-mask" value="{{$pessoa->smartphone}}" placeholder="{{$pessoa->smartphone}}" aria-label="celular">
                                    </div>
                                    

                                    <div class="col-md-4 ">
                                        <label for="celular2" class="form-label">Telefone Fixo</label>
                                        <input type="text" id="telephone" name="telephone" class="form-control cel-sp-mask" value="{{$pessoa->telephone}}" placeholder="{{$pessoa->telephone}}" aria-label="fixo">
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="pills-endereco-{{$pessoa->id}}" role="tabpanel" aria-labelledby="pills-endereco-tab-{{$pessoa->id}}">
                            <div class="container"> 
                                <div class="row p-2">
                                    <div class="col-md-3">
                                        <label for="cep" class="form-label">CEP</label>
                                        <input name="cep" type="text" id="cep" name="cep" value="{{$pessoa->cep}}" placeholder="{{$pessoa->cep}}" class="form-control cep-mask" aria-label="cep" onblur="pesquisacep(this.value);">
                                    </div>

                                    <div class="col-md-2">
                                        <label for="number" class="form-label">Número</label>
                                        <input type="number" id="number" name="number"  class="form-control"  value="{{$pessoa->number}}" placeholder="{{$pessoa->number}}"aria-label="numero">
                                    </div>

                                    <div class="col-md-7">
                                        <label for="street" class="form-label">Rua</label>
                                        <input name="street" type="text" id="street" value="{{$pessoa->street}}" placeholder="{{$pessoa->street}}" class="form-control" aria-label="rua">
                                    </div>
                                </div>

                                <div class="row p-2">
                                    
                                    <div class="col-md-5">
                                        <label for="neighborhood" class="form-label">Bairro</label>
                                        <input name="neighborhood" type="text" id="neighborhood" value="{{$pessoa->neighborhood}}" placeholder="{{$pessoa->neighborhood}}" class="form-control"  aria-label="bairro">
                                    </div>

                                    <div class="col-md-5">
                                        <label for="city" class="form-label">Cidade</label>
                                        <input name="city" type="text" id="city" value="{{$pessoa->street}}" placeholder="{{$pessoa->street}}" class="form-control" aria-label="cidade">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="uf" class="form-label">Estado</label>
                                        <input name="uf" type="text" id="uf" class="form-control" value="{{$pessoa->uf}}" placeholder="{{$pessoa->uf}}"aria-label="uf">
                                    </div>
                                </div>

                                <div class="row p-2">      
                                    <div class="col-md-12">
                                        <label for="complement" class="form-label">Complemento</label>
                                        <textarea class="form-control" id="complement" name="complement" aria-label="observacoes">{{$pessoa->complement}}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-info-{{$pessoa->id}}" role="tabpanel" aria-labelledby="pills-info-tab-{{$pessoa->id}}">
                            <div class="container"> 
                                <div class="row p-2">

                                    <div class="col-md-12 ">
                                        <label for="observations" class="form-label">Observações</label>
                                        <textarea id="observations" name="observations" class="form-control"  aria-label="observacoes">{{$pessoa->observations}}</textarea>
                                    </div>       

                                </div>
                            </div>
                        </div>
                    
                </div>
                        
                        <div class="modal-footer">
                            <a class="btn btn-danger" href="/pessoas">Cancelar</a>
                            <button type="submit" class="btn btn-success">Salvar Alterações</button>
                        </div>
            </form>
            </div>
        </div>
    </div>
</div>

@endforeach
