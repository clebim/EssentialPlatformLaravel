$(document).ready(function () {

    var modalUser = $("#modalUser");

    modalUser.on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var user  = button.data('index')
        $('#id').text(user.id)
        $('#name').text(user.name)
        $('#email').text(user.email)
        $('#message').text(`Ao confirmar, o usuário com o e-mail ${user.email} será capaz
    de acessar o sistema e visualizar as informações neste presente.
  `)
        $('#dateTime').text(user.created_at)
    })

    $('#approval').click( function (event) {
        var element = document.getElementById('feedback');
        element.innerHTML = '<div class="spinner-border text-primary" role="status"><span class="sr-only">Carregando...</span></div>';

        var id = $('#id').text();

        $.get({
            url: `/admin/on-approval/${id}/approval`,
            method: 'get',
            success: function (response) {
                
                if(response.success == true) {
                    element.innerHTML = '<div class="badge badge-success m-5"><i class="fa fa-check text-light" ></i><span class="text-light h5 ml-3" >Usuário aprovado</span></div>'
                    
                    /*Elimina a row*/
                    setTimeout(() => {
                        var tableRow = '#table-row-' + id;
                        $(tableRow).remove();
                        modalUser.modal('hide');
                        element.innerHTML = ''
                    }, 1500);
                } else {
                    element.innerHTML = '<div class="badge badge-danger m-5"><i class="fa fa-times text-light" ></i><span class="text-light h5 ml-3" >Voce não possui permissão</span></div>'
                    
                    /*Elimina a row*/
                    setTimeout(() => {
                        modalUser.modal('hide');
                        element.innerHTML = ''
                    }, 1500);
                }
            },
            error: function (response) {
                element.innerHTML = '<span class="text-danger h5">falhou</span>'
                setTimeout(() => {
                    modalUser.modal('hide');
                    element.innerHTML = ''
                }, 1500);
            }
        });

    })

    $('#reject').click(function () {

        var element = document.getElementById('feedback');
        element.innerHTML = '<div class="spinner-border text-primary" role="status"><span class="sr-only">Carregando...</span></div>';

        var id = $('#id').text();

        $.get({
            url: `/admin/on-approval/${id}/reject`,
            method: 'get',
            success: function (response) {
                
                if(response.success == true) {
                    element.innerHTML = '<div class="badge badge-warning m-5"><i class="fa fa-check text-light" ></i><span class="text-light h5 ml-3" >Usuário reprovado</span></div>'
                    
                    /*Elimina a row*/
                    setTimeout(() => {
                        var tableRow = '#table-row-' + id;
                        $(tableRow).remove();
                        modalUser.modal('hide');
                        element.innerHTML = ''
                    }, 1500);
                } else {
                    element.innerHTML = '<div class="badge badge-danger m-5"><i class="fa fa-times text-light" ></i><span class="text-light h5 ml-3" >Voce não possui permissão</span></div>'
                    
                    /*Elimina a row*/
                    setTimeout(() => {
                        modalUser.modal('hide');
                        element.innerHTML = ''
                    }, 1500);
                }
            },
            error: function (response) {
                element.innerHTML = '<span class="text-danger h5">falhou</span>'
                setTimeout(() => {
                    modalUser.modal('hide');
                    element.innerHTML = ''
                }, 1500);
            }
        });

    });
});

