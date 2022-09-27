function escrever(){

    document.getElementById('escrever').style.display = "block";
    document.getElementById('corpo').style.display = "none";
}

function retornar(){

    document.getElementById('escrever').style.display = "none";
    document.getElementById('corpo').style.display = "block";
}

function info(){

    var ponto = document.getElementById('info');

    if (ponto.style.display == "none"){

        ponto.style.display = "block";
    } else {
        ponto.style.display = "none";
    }
}