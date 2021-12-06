<!-- Modal Cadastro de produtos -->
<div class="modal fade" id="produtosCadastro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" >
                <h5 class="modal-title">Cadastro de produto</h5> 
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav abas-cadastro nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-produto-tab" data-bs-toggle="pill" data-bs-target="#pills-produto" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                        <svg class="crud-icon me-2"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                        </svg>Produto</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class=" nav-link" id="pills-sales-tab" data-bs-toggle="pill" data-bs-target="#pills-sales" type="button" role="tab" aria-controls="pills-sale" aria-selected="false">
                        <svg class="crud-icon me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">
                        <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z"/>
                        <path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z"/>
                        </svg>Descontos</button>
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
            <form class="row g-3 text-start" method="POST" action="/produtos">
            @csrf
                <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-produto" role="tabpanel" aria-labelledby="pills-produto-tab">
                            <div class="container"> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <img 
                                        src="https://images.unsplash.com/photo-1634738881327-50dd958f557a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=580&q=80"
                                         class="img-thumbnail" alt="Imagem do produto" height="15px">
                                    </div>

                                    <div class="col-md-6 ">
                                        <div class="row p-2">
                                            <label for="name" class="form-label">Nome do produto</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <label for="category" class="form-label">Categoria</label>
                                                <select class="form-select" aria-label="category" id="category" name="category" required>
                                                <option value="NULL" selected>Nenhuma</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                                <div class="col-md-6 ">
                                                <label for="stock" class="form-label">Estoque</label>
                                                <input id="stock" name="stock" type="number" step="1" min=0 class="form-control"  aria-label="Estoque" aria-describedby="Estoque" required>
                                            </div>
                                        </div>

                                        <div class="p-1">
                                        </div>

                                            <div class="col-md-12 ">
                                                <label for="price" class="form-label">Preço</label>

                                                    <div class="input-group">
                                                        <span class="input-group-text" id="basic-addon1">R$</span>
                                                        <input id="price" name="price" type="number" step="0.01" min=0 class="form-control" placeholder="50,00" aria-label="Preço" aria-describedby="Preço" required>
                                                    
                                            
                                                        <span class="input-group-text">por</span>
                                                        <select class="form-select" id="unit" name="unit" required>
                                                        
                                                        <option value="Unidade">Unidade</option>
                                                        <option value="Duzia">Dúzia</option>
                                                        <option value="Cento">Cento</option>
                                                        <option value="Milha">Milha</option>
                                                        <option value="Metro">Metro</option>
                                                        <option value="Metro_quadrado">Metro quadrado</option>
                                                        <option value="Centimetro">Centimetro</option>
                                                        <option value="Milimetro">Milímetro</option>
                                                        <option value="Grama">Grama</option>
                                                        <option value="Quilo">Kilo</option>
                                                        <option value="Litro">Litro</option>
                                                        <option value="Hora">Hora</option>
                                                        </select>
                                                    </div>
                                            </div>

                                            <div class="p-1">
                                            </div>
                                               
                                            <div class="row-md-12">
                                                <label for="description" class="form-label">Descrição</label>
                                                <textarea id="description" name="description" class="form-control" placeholder="" aria-label="description"></textarea>
                                            </div> 
                                    </div>


                                   
                                </div>
                    
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-sales" role="tabpanel" aria-labelledby="pills-sales-tab">
                            <div class="container"> 
                                <div class="row p-2">

                                <div class="col-md-12 ">
                                                <label for="price" class="form-label">Desconto de:</label>

                                                    <div class="input-group">
                                                        <span class="input-group-text" id="basic-addon1">R$</span>
                                                        <input id="discount_value" name="discount_value" type="number" step="0.01" min=0 class="form-control" placeholder="50,00" value="0">
                        
                                                        <span class="input-group-text">por cada</span>
                                                       
                                                        <input id="discount_unit" name="discount_unit" type="number" step="1" min=0 class="form-control" placeholder="1" value="1" >
                                                        <span class="input-group-text" id="unit_type">Unidade</span>
                                                    </div>
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
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>
            </form>
            </div>
        </div>
    </div>
<script> 

$("#unit").on({
    change: function(){
        var unit = $('#unit option:selected').text();
        $("#unit_type").html(unit);
  },

  
  
  });

</script>
</div>


