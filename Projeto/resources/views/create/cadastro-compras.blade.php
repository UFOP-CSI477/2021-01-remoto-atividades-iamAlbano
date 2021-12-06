<!-- Modal Cadastro de compras -->
<div class="modal fade" id="comprasCadastro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" >
                <h5 class="modal-title">Cadastro de venda</h5> 
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav abas-cadastro nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-compra-tab" data-bs-toggle="pill" data-bs-target="#pills-compra" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                        <svg class="crud-icon me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>Venda</button>
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
              <form class="row g-3 text-start" method="POST" action="/compras">
                @csrf
                <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-compra" role="tabpanel" aria-labelledby="pills-compra-tab">
                            
                            <div class="container"> 
                                <div class="row p-2">
                                    <div class="col-md-5">
                                        <label for="supplier" class="form-label">
                                            Comprador
                                            
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                            </svg>
                                        </label>
                                        <select id="supplier" name="supplier" class="form-select" aria-label="Default select example">
                                
                                            @foreach($people as $person)
                                            <option value="{{$person->id}}">{{$person->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-2 ">
                                        <label for="data" class="form-label">Data da compra</label>
                                        <input type="date" value="<?php echo date('Y-m-d'); ?>"class="form-control" id="date" name="date" required>
                                    </div>

                                    <div class="col-md-2 ">
                                        <label for="delivery" class="form-label">Data de entrega</label>
                                        <input type="date" value="<?php echo date('Y-m-d'); ?>"class="form-control" id="delivery" name="delivery" required>
                                    </div>

                                    <div class="col-md-3 ">
                                        <label for="supplier" class="form-label">
                                            Situação          
                                        </label>
                                        <select id="situation" name="situation" class="form-select" aria-label="Default select example">
                                            <option value="Emitida">Emitida</option>
                                            <option value="Aguardando entrega">Aguardando entrega</option>
                                            <option value="Finalizada">Finalizada</option>
                                            <option value="Cancelada">Cancelada</option>
                                        </select>
                                    </div>
                                </div>  

                                <div class="row p-2">
                                <div class="overflow-scroll" style="height: 30vh">
                                    <table id="products-buy" name="products-buy" class="table table-borderless">
                                        <thead class="sticky-top">
                                            <tr>
                                                <th scope="col">Produto/serviço</th>
                                                <th scope="col">Quantidade</th>
                                                <th scope="col">Preço da unidade</th> 
                                                <th scope="col">Valor total</th> 
                                                <th scope="col" class="text-center">Remover</th>                            
                                            </tr>
                                        </thead>
                                        
                                        <tbody id="new-buy-products">

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
                                                <div class="col">
                                                    <a id="button-add" class="btn btn-outline-success">Adicionar produto &nbsp;
                                                    <svg  xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-plus-circle-fill' viewBox='0 0 16 16'>
                                                        <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z'/>
                                                    </svg>
                                                    </a> 
                                                </div>
                                                <div class="col col-3">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Desconto: R$</span>
                                                        <input min="0" type="number" value="0.00" class="form-control" id="discount" name="discount" onchange="calc_value()" onkeyup="calc_value()">
                                                    </div>
                                                </div>
                                                <div class="col col-4">
                                                    
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">Valor total: R$</span>
                                                        <input type="number" value="0.00" class="form-control" id="price" name="price" onchange="$(this).mask('R$ 999.990,00')" readonly>
                                                    </div>
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
                                        <textarea id="observations" name="observations" class="form-control" style="height: 30vh" aria-label="observacoes"></textarea>
                                    </div>       

                                </div>
                            </div>
                        </div>
                        
                 
                    
                </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" 
                            @if(count($people) == 0)disabled @endif>Cadastrar</button>
                        </div>
             </form>
            </div>
        </div>
    </div>
</div>


<script>
document.cookie = "promo_shown=1; Max-Age=2600000; Secure" 
"promo_shown=1; Max-Age=2600000; Secure"


var count = 0;
var products_id = [];
var total = 0;

    function calc_price(item){
    
        let quant = parseFloat(document.getElementById('quantidade-'+item).value); 
        let unit = parseFloat(document.getElementById('valor-unidade-'+item).value);
        if(isNaN(unit)){ unit = 0;  }
        if(isNaN(quant)){ quant = 0; }    
        let total_produto =  parseFloat(quant*unit);
        document.getElementById('valor-total-'+item).value = total_produto;
        total += total_produto;

    }

    function calc_value(){
        total = 0;

        products_id.forEach(calc_price);    
        preco_final = parseFloat(total) - parseFloat(document.getElementById('discount').value);
        if(preco_final < 0 ){ preco_final = 0; }
        document.getElementById('price').value = preco_final;
        
    }

    function add_product_to_buy(){

    $("#new-buy-products").append(
    `<tr id="new-buy-product-`+count+ `">
        <td><input type="text" class="form-control" list="products-list" id="produto-`+count+`" name="input[nome][]" onchange="calc_value()" required></td>
        
        <td width="35%">
            <div class="input-group mb-2">
                <input id="quantidade-`+count+`" name="input[quantidade][]" type="number" min="0" class="form-control text-end" onchange="calc_value()" onkeyup="calc_value()" required>
                <select class="form-select input-group-text text-start" aria-label="Default select example" id="unit-`+count+`" name="input[unit][]">
                    <option value="Unidade" selected>Unidade(s)</option>
                        <option value="Dúzia(s)">Dúzia(s)</option>
                        <option value="Cento(s)">Cento(s)</option>
                        <option value="Milha(s)">Milha(s)</option>
                        <option value="Metro(s)">Metro(s)</option>
                        <option value="Metro quadrado(s)">Metro quadrado(s)</option>
                        <option value="Centímetro(s)">Centímetro(s)</option>
                        <option value="Milímetro(s)">Milímetro(s)</option>
                        <option value="Grama(s)">Grama(s)</option>
                        <option value="Quilo(s)">Quilo(s)</option>
                        <option value="Litro(s)">Litro(s)</option>
                        <option value="Hora(s)">Hora(s)</option>
                    </select>
                
            </div>  
        </td>

        <td width="15%">
            <div class="input-group mb-2" >
                <span class="input-group-text">R$</span>
                <input id="valor-unidade-`+count+`" name="input[valor-unidade][]" type="number" class="form-control"  min="0" step="0.01" onchange="calc_value()" onkeyup="calc_value()"  required>
                </div>
        </td>
                                                                                             
        <td width="13%">
            <div class="input-group mb-2" >
                <span class="input-group-text">R$</span>
                <input id="valor-total-`+count+`" name="input[valor-total][]" type="number" class="form-control" readonly>
                </div>
        </td>
        <td class="text-center" >
            <a class='btn btn-outline-danger' onclick='delete_buy_product\(` +count+ `\)'>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                </svg>
             </a>
        </td>
    </tr>`
    );
    products_id.push(count);
    count ++;
    }



$(document).ready(function() {
add_product_to_buy();
});


$("#button-add").on({
    click: function(){ 
    add_product_to_buy(); 
}
});

function delete_buy_product(num){
    $("#new-buy-product-"+num).remove();
    products_id.splice(products_id.indexOf(num), 1);
    calc_value();
}




</script>


