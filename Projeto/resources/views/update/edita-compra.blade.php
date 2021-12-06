<!-- Modal Edição de compras -->

@foreach($buys as $buy)
<div class="modal fade" id="buy-id-{{$buy->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" >
                <h5 class="modal-title">Visualizar compra</h5> 
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav abas-cadastro nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-compra-tab-{{$buy->id}}" data-bs-toggle="pill" data-bs-target="#pills-compra-{{$buy->id}}" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                        <svg class="crud-icon me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>Compra</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-produtos-tab-{{$buy->id}}" data-bs-toggle="pill" data-bs-target="#pills-produtos-{{$buy->id}}" type="button" role="tab" aria-controls="pills-produto" aria-selected="true">
                        <svg class="crud-icon me-2"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                        </svg>Produtos</button>
                    </li>
                    
                </ul>

                <hr id="divider">
              <form class="row g-3 text-start" method="POST" action="/compras/update/{{$buy->id}}">
                @csrf
                @method('PUT')
                <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-compra-{{$buy->id}}" role="tabpanel" aria-labelledby="pills-compra-tab-{{$buy->id}}">
                            
                            <div class="container"> 
                                <div class="row p-2">
                                    <div class="col-md-5">
                                        <label for="supplier" class="form-label">
                                            Fornecedor
                                            
                                        </label>
                                        <input type="text" class="form-control"
                                            @foreach($suppliers as $supplier)
                                            @if($supplier->id == $buy->person_id)value="{{$supplier->name}}" @endif
                                            @endforeach

                                        readonly>
                                    </div>
                                    

                                    <div class="col-md-3 ">
                                        <label for="cpf_cnpj" class="form-label">
                                        @foreach($suppliers as $supplier)
                                            @if($supplier->id == $buy->person_id)
                                                @if($supplier->type == 'Física')
                                                     CPF
                                                    @else
                                                     CNPJ 
                                                @endif
                                            @endif
                                        @endforeach
                                        </label>    

                                        <input type="text" 
                                        @foreach($suppliers as $supplier)
                                                @if($supplier->id == $buy->person_id)value="{{$supplier->cpf_cnpj}}" @endif
                                        @endforeach
                                        class="form-control"  readonly>
                                    </div>

                                    <div class="col-md-2 ">
                                        <label class="form-label">
                                        Celular
                                        </label>    

                                        <input type="text" 
                                        @foreach($suppliers as $supplier)
                                                @if($supplier->id == $buy->person_id)value="(31) 9 1234-5678" @endif
                                        @endforeach
                                        class="form-control"  readonly>
                                    </div>

                                    <div class="col-md-2 ">
                                        <label  class="form-label">
                                        Telefone 
                                        </label>    

                                        <input type="text" 
                                        @foreach($suppliers as $supplier)
                                                @if($supplier->id == $buy->person_id)value="(31) 9 1234-5678" @endif
                                        @endforeach
                                        class="form-control"  readonly>
                                    </div>

                                                  
                                </div>  

                                <div class="row p-2">

                                    <div class="col col-2">
                                        <label class="form-label">Desconto</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">R$</span>
                                            <input type="number" value="{{$buy->discount}}" class="form-control" id="price" name="price"readonly>
                                        </div>
                                    </div>
                                    <div class="col col-2">
                                    <label class="form-label">Valor total</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">R$</span>
                                            <input type="number" value="{{$buy->price}}" class="form-control" id="price" name="price"readonly>
                                        </div>
                                    </div> 

                                    <div class="col-md-2 ">
                                        <label for="data" class="form-label">Data da compra</label>
                                        <input type="date" value="<?php echo date('Y-m-d', strtotime($buy->date)) ?>"class="form-control" id="date" name="date" required>
                                    </div>

                                    <div class="col-md-2 ">
                                        <label for="delivery" class="form-label">Data de entrega</label>
                                        <input type="date" value="<?php echo date('Y-m-d', strtotime($buy->delivery)) ?>"class="form-control" id="delivery" name="delivery" required>
                                    </div>

                                    <div class="col-md-4 ">
                                        <label for="supplier" class="form-label">
                                            Situação          
                                        </label>
                                        <select id="situation" name="situation" class="form-select" aria-label="Default select example">
                                            <option value="Emitida" @if($buy->situation == "Emitida")selected @endif >Emitida</option>
                                            <option value="Aguardando entrega" @if($buy->situation == "Aguardando entrega")selected @endif>Aguardando entrega</option>
                                            <option value="Finalizada" @if($buy->situation == "Finalizada")selected @endif>Finalizada</option>
                                            <option value="Cancelada" @if($buy->situation == "Cancelada")selected @endif>Cancelada</option>
                                        </select>
                                    </div>  
                                </div>

                                <div class="row p-2">

                                    <div class="col-md-12 ">
                                        <label for="observations" class="form-label">Observações</label>
                                        <textarea id="observations" name="observations" class="form-control" style="height: 10vh" aria-label="observacoes">{{$buy->observations}}</textarea>
                                    </div>       

                                </div>


                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-produtos-{{$buy->id}}" role="tabpanel" aria-labelledby="pills-produtos-tab-{{$buy->id}}">
                        <div class="row p-2">
                                <div class="overflow-scroll" style="height: 40vh">
                                <table id="products-buy" name="products-buy" class="table table-borderless">
                                        <thead class="sticky-top">
                                            <tr>
                                                <th scope="col">Produto</th>
                                                <th scope="col">Quantidade</th>
                                                <th scope="col">Preço da unidade</th> 
                                                <th scope="col">Valor total</th>                            
                                            </tr>
                                        </thead>
                                        
                                        <tbody id="new-buy-product">
                                                
                                                @foreach($buy_inputs as $buy_input)
                                                    @if($buy_input->buy_id == $buy->id)
                                                    <tr id="new-buy-product">
                                                        <td><input 
                                                        @foreach($inputs as $input)
                                                                    @if($input->id == $buy_input->input_id)
                                                                            value="{{$input->name}}" 
                                                                    @endif 
                                                                @endforeach
                                                        
                                                        type="text" class="form-control" readonly></td>

                                                        
                                                        <td width="35%">
                                                            <div class="input-group mb-2">
                                                                <input id="quantidade" type="number" value="{{$buy_input->quantity}}" min="0" class="form-control text-end" onchange="total_value()" onkeyup="total_value()" readonly>
                                                                <input type="text" 
                                                                @foreach($inputs as $input)
                                                                    @if($input->id == $buy_input->input_id)
                                                                            value="{{$input->unit}}" 
                                                                    @endif 
                                                                @endforeach
                                                            class="form-control text-start" readonly>
                                                            </div>  
                                                        </td>

                                                        <td width="15%">
                                                            <div class="input-group mb-2" >
                                                                <span class="input-group-text">R$</span>
                                                                <input id="valor-unidade" value="{{$buy_input->unit_price}}" type="number" class="form-control"  min="0" step="1" readonly>
                                                                </div>
                                                        </td>
                                                                                                                                            
                                                        <td width="13%">
                                                            <div class="input-group mb-2" >
                                                                <span class="input-group-text">R$</span>
                                                                <input id="valor-total" type="number" value="{{$buy_input->total_price}}" class="form-control" readonly>
                                                                </div>
                                                        </td>
                                                        
                                                    </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                                <datalist id="products-list">
                                                @foreach($products as $product)
                                                    <option value="{{$product->name}}">{{$product->name}}</option>
                                                @endforeach
                                                </datalist>

                                        
                                            
                                    </table>
                                </div>                   
                        </div>                                 
                                           
                                
                                        <div class="container">
                                            <div class="row">
                                                <div class="col col-4">
                                                <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Desconto: R$</span>
                                                        <input type="number" value="{{$buy->discount}}" class="form-control" id="price" name="price"readonly>
                                                    </div>
                                                </div>
                                                <div class="col col-4">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Valor total: R$</span>
                                                        <input type="number" value="{{$buy->price}}" class="form-control" id="price" name="price"readonly>
                                                    </div>
                                                </div>                 
                                            </div>
                                </div>
                        </div>

                        
                        
                 
                    
                </div>
                        
                        <div class="modal-footer">
                            <a href="/compras" type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</a>
                            <button type="submit" class="btn btn-success">Salvar alterações</button>
                        </div>
             </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


</script>




@endforeach
