function nav(){


    if(document.getElementById('list_nav').style.display == 'none') {
        document.getElementById('list_nav').style.display = 'block';
    } else {
        document.getElementById('list_nav').style.display = 'none';
    }
}

/*-----------------------------------------------------------------------------------------*/

function foto(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {

            $('#capa1')
                .attr('src', e.target.result)
        };

        reader.readAsDataURL(input.files[0]);
    }
}

/*----------------------------------------------------------------------------------------*/

var livros = document.getElementsByClassName('card');

