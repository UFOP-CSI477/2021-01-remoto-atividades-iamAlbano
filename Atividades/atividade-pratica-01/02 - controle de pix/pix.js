let saldo_usuario = 0;

document.addEventListener("DOMContentLoaded", function (){
    var saldo = document.querySelector("#saldo");
    saldo_usuario = saldo.value;

    var chave= document.querySelector("#chave");

    fetch("https://brasilapi.com.br/api/banks/v1")
                .then(response => response.json())
                .then(data => preencheSelect(data) )
            .catch(error => console.error(error))
    
    
});

function preencheSelect(data){

    let bancos = document.getElementById("bancos");

    for( let index in data) {
        
        const { name  } = data[index];

        let option = document.createElement("option");
        option.value = name;
        option.innerHTML = `${name}`;

        bancos.appendChild(option);
    }
}

function depositar(){
    var saldo = document.querySelector("#saldo");
    var deposito = document.querySelector("#deposito");
    var historico = document.querySelector("#historico");
    
    
    if(deposito != ""){  
        let valor = parseInt(deposito.value) + parseInt(saldo_usuario);
        saldo_usuario = valor;
        saldo.value = valor;
    }

    

    $('#historico').append(`

    <div class="row justify-content-center shadow-lg p-3 mb-1 bg-body rounded">
    <div class="col">
        <svg style="fill: green"xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square-fill" viewBox="0 0 16 16">
        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5a.5.5 0 0 1 1 0z"/>
        </svg>
    </div>
    <div class="col">
        Depósito
    </div>
    <div class="col">
        R$ ${deposito.value}
    </div>
    </div>
    `);
    
    deposito.value = 0;
    
}

function selectPix(){

    var select = document.getElementById('tipoChave');
    var tipoChave = select.options[select.selectedIndex].value;
    var input = document.getElementById("input-chave");


    if(tipoChave == 1){
        input.innerHTML = `<input type="text" class="form-control" placeholder="Insira o CPF" id="chave" onkeyup="insereChave()" onkeypress="$(this).mask('000.000.000-00');">`;
    } 
    else if(tipoChave == 2){
        input.innerHTML = `<input type="text" class="form-control" placeholder="Insira o CNPJ" id="chave" onkeyup="insereChave()" onkeypress="$(this).mask('00.000.000/0000-00')">`;
    }
    else if(tipoChave == 3){
        input.innerHTML = `<input type="text" class="form-control" placeholder="Insira o número de telefone" id="chave" onkeyup="insereChave()" onkeypress="$(this).mask('(00) 0000-00009')">`;
    }  
    else if(tipoChave == 0){
        input.innerHTML = `<input type="text" class="form-control" placeholder="Escolha o tipo de chave" id="chave" onkeyup="insereChave()"disabled>`;
    }

    else {
        input.innerHTML = `<input type="text" class="form-control" placeholder="Insira a chave" id="chave" onkeyup="insereChave()">`;
    }
}

function insereChave(){
    var chave = document.getElementById('chave');
    var select = document.getElementById('tipoChave');
    var tipoChave = select.options[select.selectedIndex].value;

    if(tipoChave == 1 && chave.value.length > 13){
        document.querySelector("#pix").removeAttribute("disabled");
    } else if(tipoChave == 2 && chave.value.length > 17){
        document.querySelector("#pix").removeAttribute("disabled");
    }
    else if(tipoChave == 3 && chave.value.length > 13){
        document.querySelector("#pix").removeAttribute("disabled");
    }
    else if(tipoChave != 0 && chave.value.length > 4){
        document.querySelector("#pix").removeAttribute("disabled");
    } 
    else {
        document.querySelector("#pix").setAttribute("disabled", "disabled");
    }
}

function insereValor(){
    var valor = document.getElementById('pix');
    var data= document.getElementById('data');

    if(valor.value != 0){
        data.removeAttribute("disabled");
    } else {
        data.setAttribute("disabled", "disabled");
    }
    
}

function verifica(){
    var select = document.getElementById('tipoChave');
    var tipoChave = select.options[select.selectedIndex].value;
    var valor = document.getElementById('pix');
    var chave = document.getElementById('chave')
    
    if(valor.value != 0 && tipoChave != 0 && chave.value.length > 3){
        document.querySelector("#enviarPix").removeAttribute("disabled");
    } else if(valor.value == 0 || tipoChave == 0 || chave.value.length < 3) {
        document.querySelector("#enviarPix").setAttribute("disabled", "disabled");
    }
}

function enviaPix(){

    dataAtual = new Date();

    var selectBanco = document.getElementById('bancos');
    var banco = selectBanco.options[selectBanco.selectedIndex].value;

    var select = document.getElementById('tipoChave');
    var valor = document.getElementById('pix');
    var saldo = document.querySelector("#saldo");
    var chave = document.getElementById('chave');
    var data = document.getElementById('data');

    
    var partesData = data.value.split("-");
    var dataPix = new Date(partesData[0], partesData[1] -1, partesData[2]);
    
    dataCompara = new Date(dataAtual.getFullYear(), dataAtual.getMonth(), dataAtual.getDay());


    if(chave.value == ""){

        alert("Insira a chave do recebedor!");

    }   else if(banco == 0){

        alert("Selecione o banco do recebedor!");

    }   else if(dataPix < dataCompara || data.value== ''){

        alert("Data inválida!");

    }   else if(valor.value > parseInt(saldo_usuario)){

        alert("Saldo insuficiente para completar a operação!");

    } else {
        
        saldo_usuario = parseInt(saldo_usuario) - parseInt(valor.value);
        saldo.value = parseInt(saldo_usuario);

        $('#historico').append(`

        <div class="row justify-content-center shadow-lg p-3 mb-1 bg-body rounded">
        <div class="col">
            <svg style="fill: red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-square-fill" viewBox="0 0 16 16">
            <path d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0z"/>
          </svg>
        </div>
        <div class="col">
            Pagamento
        </div>
        <div class="col">
            R$ ${valor.value}
        </div>
        </div>
        `);

        select.value = 0;
        chave.value = "";
        valor.value = 0;
        selectBanco.value = 0;
        valor.setAttribute("disabled", "disabled");
        chave.setAttribute("disabled", "disabled");
        data.setAttribute("disabled", "disabled");
        alert("Pix enviado com sucesso! verifique seu saldo.");
    }

   

}





















