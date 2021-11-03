function preencheSelect(data){

    let moeda1 = document.getElementById("moeda1");

    console.log(data);

    for( let index in data) {
        
        const { nomeFormatado } = data[index];     

        let option = document.createElement("option");
        option.value = nomeFormatado;
        option.innerHTML = `${nomeFormatado}`;

        moeda1.appendChild(option);
    }
}

document.addEventListener("DOMContentLoaded", function (){
    

    fetch('https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/Moedas?$format=json')
        .then(response => response.json())
        .then(data => preencheSelect(data) )
    .catch(error => console.error(error))
    

});

