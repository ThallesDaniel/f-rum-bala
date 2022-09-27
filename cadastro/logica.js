/*--------------------------------------------MASCARAR TELEFONE-------------------------------------------------------*/

var tel = document.querySelector("input[type=tel]");
tel.addEventListener('keyup', mask_tel);

function mask_tel(e) {

        let carac = e.target.value.replace(/\D/g, "");

        carac = carac.replace(/^(\d\d)(\d)/g, "($1) $2");
        carac = carac.replace(/(\d{5})(\d)/g, "$1-$2");


        e.target.value = carac;
}

/*-----------------------------------------SUBSTITUIR FOTO------------------------------------------------------------*/

function foto(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {

            $('#user1')
                .attr('src', e.target.result)
        };

        reader.readAsDataURL(input.files[0]);
    }
}