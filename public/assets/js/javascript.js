(function(win, doc) {
    'use strict';

    function confirmDel(event) {
        event.preventDefault();

        let token = doc.getElementsByName("_token")[0].value;
        if (confirm('Deseja Deletar?')) {
            let ajax = new XMLHttpRequest();
            ajax.open("DELETE", event.target.parentNode.href);
            ajax.setRequestHeader('X-CSRF-TOKEN', token);
            ajax.onreadystatechange = function() {
                if (ajax.readyState === 4 && ajax.status === 200) {
                    win.location.href = "/clients";
                }
            }
            ajax.send();

        } else {
            return false;
        }

    }


    if (doc.querySelector('.js-del')) {
        let btn = doc.querySelectorAll('.js-del');



        for (let i = 0; i < btn.length; i++) {
            btn[i].addEventListener('click', confirmDel, false);
        }

    }



})(window, document)


$('.btnCreate').on('click', function() {

    $("#inputName").val('');
    $("#inputCPF").val('');
    $("#inputCEP").val('');
    $("#inputCity").val('');
    $("#inputState").val('');
    $("#inputBairro").val('');
    $("#inputAddress").val('');
    $("#inputTel").val('');

    $('#inputCPF').mask('000.000.000-00');
    $('#inputCEP').mask('00000000');
    $('#inputTel').mask('(00)0 0000-0000');

    $("#inputCEP").css("background", "none");

});



$('body').on('click', '.editBtn', function() {

    $('.btnCreate').click();

    $('#inputCPF').mask('000.000.000-00');
    $('#inputCEP').mask('00000000');
    $('#inputTel').mask('(00)0 0000-0000');

    var client = $(this).data('client');


    $("#inputName").val(client.name);
    $("#inputCPF").val(client.cpf);
    $("#inputCEP").val(client.cep);
    $("#inputCity").val(client.cidade);
    $("#inputState").val(client.estado);
    $("#inputBairro").val(client.bairro);
    $("#inputAddress").val(client.endereco);
    $("#inputTel").val(client.telefone);


    $("#inputName").attr('value', client.name)
    $("#inputCPF").attr('value', client.cpf)
    $("#inputCEP").attr('value', client.cep)
    $("#inputCity").attr('value', client.cidade)
    $("#inputState").attr('value', client.estado)
    $("#inputBairro").attr('value', client.bairro)
    $("#inputAddress").attr('value', client.endereco)
    $("#inputTel").attr('value', client.telefone)


    var input = document.createElement("input");
    input.type = 'hidden';
    input.name = "_method";
    input.value = "PATCH";

    const form = document.querySelector('.formCad');
    form.setAttribute('action', `/clients/${client.id}`);
    form.appendChild(input)










})


$('#inputCEP').on('keyup', async function() {



    if ($(this).val().length >= 8) {

        const CEP = await fetch(`https://brasilapi.com.br/api/cep/v1/${$(this).val()}`).then(res => res.json());

        if (CEP.city) {

            $("#inputCity").val(CEP.city);
            $("#inputState").val(CEP.state);
            $("#inputBairro").val(CEP.neighborhood);
            $("#inputAddress").val(CEP.street);

            $("#inputCEP").css("background", "#b4f8d9");
            $(".btnForm").attr("disabled", false);

        }
    }
    if ($(this).val().length < 8) {

        $(".btnForm").attr("disabled", true);

        $("#inputCEP").css("background", "#f58f8f");

    }
});