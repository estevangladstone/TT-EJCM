$('.add-button').on('click', function(){

    var produto_id = $(this).attr('data-produto-id');
    var url = $(this).attr('href');

    console.log(produto_id);
    console.log(url);
    console.log(window.Laravel.csrfToken);

    $.ajax({
        method: 'POST',
        data: {
            id: produto_id,
            _token: window.Laravel.csrfToken
        },
        url: url,
        success: function(response){
            console.log(response);
            alert('O produto foi adicionado com sucesso!!!');
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });

});

$('#mostrar-carrinho').on('click', function(){
    var modal = $('#carrinho');

    var url = $(this).attr('href');
    console.log(url);

    $.ajax({
        method: 'get',
        url: url,
        success: function(response){
            console.log(response);

            var corpoModal = $('.modal-body', modal);
            corpoModal.empty();

            for(var produto in response){
                console.log(response[produto]);

                corpoModal.append(
                    $("</p>").text('Nome: '+response[produto].nome)
                );
                corpoModal.append(
                    $("</p>").text('Preco: R$ '+response[produto].preco)
                );
            }

            modal.modal('show');
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });

});





