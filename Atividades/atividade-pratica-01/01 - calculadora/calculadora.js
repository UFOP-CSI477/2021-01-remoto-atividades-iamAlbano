let operacao = '';
let result;

function calc(elemento){
    visor = document.getElementById("visor");
    visor.append(elemento);
    operacao = operacao + elemento;
    console.log(operacao);
}



function resultado(){
    visor = document.getElementById("visor");

    result = eval(operacao);
    if(result == 'Infinity'){
        window.location.href = "https://www.bbc.com/portuguese/geral-54462160";
    }
    operacao = result;
    visor.innerHTML = result;
    console.log(result);
    return;
}


