<!-- Modal Cadastro de Pessoas -->
<div class="modal fade" id="pessoasCadastro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" >
                <h5 class="modal-title">Cadastro de pessoas</h5> 
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav abas-cadastro nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-pessoa-tab" data-bs-toggle="pill" data-bs-target="#pills-pessoa" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                        <svg class="crud-icon me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>Pessoa</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class=" nav-link" id="pills-endereco-tab" data-bs-toggle="pill" data-bs-target="#pills-endereco" type="button" role="tab" aria-controls="pills-endereco" aria-selected="false">
                        <svg class="crud-icon me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                        </svg>Endereço</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class=" nav-link" id="pills-info-tab" data-bs-toggle="pill" data-bs-target="#pills-info" type="button" role="tab" aria-controls="pills-info" aria-selected="false">
                        <svg class="crud-icon me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>Observações</button>
                    </li>

                    
                </ul>

            <hr id="divider">
            <form class="row g-3 text-start" method="POST" action="/pessoas">
            @csrf
                <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-pessoa" role="tabpanel" aria-labelledby="pills-pessoa-tab">
                            <div class="container"> 
                                <div class="row p-2">
                                    <div class="col-md-6 ">
                                        <label for="name" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>

                                    <div class="col-md-6 ">
                                        <label for="nomeFantasia" class="form-label">Nome Fantasia (opcional)</label>
                                        <input type="text" class="form-control" id="fantasy_name" name="fantasy_name">
                                    </div>
                                </div>

                                <div class="row p-2">
                                    <div class="col-md-4">
                                        <label for="category" class="form-label">Categoria</label>
                                        <select id="category" name="category"class="form-select">
                                            <option value="Administrador" >Administrador</option>
                                            <option value="Cliente" selected>Cliente</option>
                                            <option value="Fornecedor">Fornecedor</option>
                                            <option value="Vendedor">Vendedor</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="type" class="form-label">Tipo de Pessoa</label>
                                        <select id="type" name="type" class="form-select">
                                            <option  selected>Física</option>
                                            <option>Jurídica</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 ">
                                        <div >
                                            <label for="blacklist" class="form-label">Adicionar a blacklist?</label>
                                            <select id="blacklist" name="blacklist" class="form-select">
                                                <option  value="0" selected>Não</option>
                                                <option value="1" >Sim</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                
                                </div>

                                  
                                    <div class="row p-2">

                                        <div class="col-md-6 ">
                                            <label for="cpf_cnpj" class="form-label" id="cpfOrcnpj">
                                                CPF                                 
                                            </label>
                                            <div id="cad">
                                            <input type="text" id="cpf_cnpj" name="cpf_cnpj" class="form-control cpf-mask" id="cpf_cnpj" required>
                                            </div>
                                            
                                        </div>
                                        

                                        <div class="col-md-6 ">
                                            <label for="rg" class="form-label">
                                                RG                                  
                                            </label>
                                            <input type="text" class="form-control disabled" id="rg" name="rg">
                                        </div> 
                                    </div>

                                   
          

                                <div class="row p-2">

                                    <div class="col-md-4 ">
                                            <label for="email" class="form-label">E-mail</label>
                                            <input required id="email" name="email" type="email" class="form-control" aria-label="email">
                                        </div>

                                    <div class="col-md-4 ">
                                        <label for="smartphone" class="form-label">Telefone Celular</label>
                                        <input id="smartphone" name="smartphone" type="text" class="form-control cel-sp-mask" aria-label="celular1" required>
                                    </div>
                                    

                                    <div class="col-md-4 ">
                                        <label for="telephone" class="form-label">Telefone Fixo</label>
                                        <input id="telephone" name="telephone" type="text" class="form-control phone-ddd-mask" aria-label="celular2">
                                    </div>


                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="pills-endereco" role="tabpanel" aria-labelledby="pills-endereco-tab">
                            <div class="container"> 
                                <div class="row p-2">
                                    <div class="col-md-3">
                                        <label for="cep" class="form-label">CEP</label>
                                        <input  name="cep" type="text" id="cep" class="form-control cep-mask" aria-label="cep" onblur="pesquisacep(this.value);">
                                    </div>

                                    <div class="col-md-2">
                                        <label for="numero" class="form-label">Número</label>
                                        <input id="number" name="number" type="number" class="form-control"  aria-label="numero">
                                    </div>

                                    <div class="col-md-7">
                                        <label for="street" class="form-label">Rua</label>
                                        <input  name="street" type="text" id="street" class="form-control" aria-label="rua">
                                    </div>
                                </div>

                                <div class="row p-2">
                                    
                                    <div class="col-md-5">
                                        <label for="neighborhood" class="form-label">Bairro</label>
                                        <input name="neighborhood" type="text" id="neighborhood" class="form-control"  aria-label="bairro">
                                    </div>

                                    <div class="col-md-5">
                                        <label for="city" class="form-label">Cidade</label>
                                        <input name="city" type="text" id="city" class="form-control" aria-label="cidade">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="uf" class="form-label">Estado</label>
                                        <input name="uf" type="text" id="uf" class="form-control" aria-label="uf">
                                    </div>
                                </div>

                                <div class="row p-2">      
                                    <div class="col-md-12">
                                        <label for="complement" class="form-label">Complemento</label>
                                        <textarea id="complement" name="complement" class="form-control" aria-label="complement"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                            <div class="container"> 
                                <div class="row p-2">

                                    <div class="col-md-12 ">
                                        <label for="observations" class="form-label">Observações</label>
                                        <textarea id="observations" name="observations" class="form-control" placeholder="" aria-label="observacoes"></textarea>
                                    </div>       

                                </div>
                            </div>
                        </div>



                        
                    
                </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" >Cadastrar</button>
                        </div>
            </form>
            </div>
        </div>
    </div>
    <script> 

$("#type").on({
    change: function(){
        var person_type = $('#type option:selected').text();

        if(person_type === 'Jurídica'){
            cpf_cnpj = 'CPNJ';
            $("#cad").html(`<input type="text" id="cpf_cnpj" name="cpf_cnpj" class="form-control" id="cpf_cnpj" onkeypress="$(this).mask('00.000.000/0000-00');" required>`);
            $("#rg").prop("disabled", true);
        } else if(person_type === 'Física'){
            cpf_cnpj = 'CPF';
            $("#cad").html(`<input type="text" id="cpf_cnpj" name="cpf_cnpj" class="form-control" id="cpf_cnpj" onkeypress="$(this).mask('000.000.000-00');" required>`);
            $("#rg").prop("disabled", false);
        }
        $("#cpfOrcnpj").html(cpf_cnpj);
  },

  
  
  });

</script>
</div>


