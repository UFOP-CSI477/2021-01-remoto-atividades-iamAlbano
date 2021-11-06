function chamaConversor(){
    var moeda1 = document.getElementById("moeda1");
    var moeda2 = document.getElementById("moeda2");

    var valor1 = document.getElementById("valor1");
    var valor2 = document.getElementById("valor2");

    conversor(moeda1.value, moeda2.value, valor1.value, valor2.value);
}


function conversor(moeda1, moeda2, valor1, valor2){

    var simbolo;

    if(moeda1 == 'BRL'){
        simbolo = moeda2;
        
    } else if(moeda2 == 'BRL'){
        simbolo = moeda1;
    }

   
    var url_conversor = `https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoMoedaDia(moeda=@moeda,dataCotacao=@dataCotacao)?@moeda='${simbolo}'&@dataCotacao='11-05-2021'&$top=100&$format=json&$select=cotacaoCompra,cotacaoVenda`;

    fetch(url_conversor)
        .then(response => response.json())
        .then(data => {
            const { cotacaoCompra, cotacaoVenda } = data.value[data.value.length - 1];     
    
            var valor2 = document.getElementById("valor2");
            var valor1 = document.getElementById("valor1");
     
            valor2.value = cotacaoCompra*valor1.value;
            
        } )
    .catch(error => console.error(error))
    

}

function converte(data){
    const { cotacaoCompra, cotacaoVenda } = data[data.length - 1];     
    
    var valor2 = document.getElementById("valor2");
    var valor1 = document.getElementById("valor1");

    valor2.value = cotacaoCompra;
}




function preencheMoedas(data){

    let moeda1 = document.getElementById("moeda1");
    let moeda2 = document.getElementById("moeda2");

    for( let index in data) {
        
        const { nomeFormatado, simbolo } = data[index];     

        let option1 = document.createElement("option");
        let option2 = document.createElement("option");
        option1.value = option2.value = simbolo;
        option1.innerHTML = option2.innerHTML = `${nomeFormatado}`;

        moeda1.appendChild(option1);

        if(simbolo == 'USD'){
            option2.setAttribute('selected', '')
        }
        moeda2.appendChild(option2);
    }


}

document.addEventListener("DOMContentLoaded", function (){
    
    const url_moedas = `https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/Moedas?$top=100&$format=json`;


    fetch(url_moedas)
        .then(response => response.json())
        .then(data => preencheMoedas(data.value) )
    .catch(error => console.error(error))

    conversor('BRL', 'USD', 1, 1);



});

